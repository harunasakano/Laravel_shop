<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Lib\UtilityApi;
use App\Lib\UtilityItemApi;

class ShoppingController extends Controller
{
    public function top()
    {
        $categories = config('yahoo_api.categories');
        $sortOrders = config('yahoo_api.sortOrder');

            return view('shopping.top')->with([
            "categories" => $categories,
            "sortOrders"  => $sortOrders
            ]);
    }

    public function search(Request $request)
    {
        $appid = config('yahoo_api.appid');
        $categories = config('yahoo_api.categories');
        $sortOrders = config('yahoo_api.sortOrder');
        $hitCode = array();

        //検索キーワード
        $queryWord = !empty($request->query_word) ? $request->input('query_word'): "";

        //並び順序
        $sort =  !empty($request->input('sort')) && array_key_exists($request->input('sort'), $sortOrders) ? $request->input('sort') : "-score";

        //カテゴリ
        $category_id = ctype_digit($request->input('category_id')) && array_key_exists($request->input('category_id'), $categories) ? $request->input('category_id') : 1;

        $utility_api = new UtilityApi();

        $hits = $utility_api->Get_query_result($queryWord,$sort,$category_id);

        if(!empty($hits)){
            return view('shopping.search')->with("hits",$hits);
        }else{
            return view('shopping.error');
        }
    }

    public function item(Request $request)
    {

        $duplication_item_key = null;

        //カートに商品を追加した場合の処理
        if ($request->has('itemCode') && $request->has('itemName') && $request->has('itemPrice') && $request->has('itemCount')){

            //カートの中身を参照し、同一の商品コードがあるか検索
            $carts = $request->session()->get('cartItem');

            if(isset($carts)){
                for($i=0; $i<count($carts); $i++){
                    if( $request->input('itemCode') === $carts[$i]['itemCode'] ){
                        $duplication_item_key = $i;
                    }
                }
            }

                    if(isset($duplication_item_key)){
                        //元々カートに入っていた値に新規リクエストの個数を加算する
                        $carts[$duplication_item_key]['itemCount'] += $request->input('itemCount');

                        //一旦cartItemセッションをクリア
                        $request->session()->forget('cartItem');

                        //配列を再格納
                        $request->session()->put("cartItem", $carts);
                        $carts = $request->session()->get('cartItem');

                        return redirect('/cart');

                    }else{
                        //新規追加

                        $cartItem['itemCode'] = $request->input('itemCode');
                        $cartItem['itemName'] = $request->input('itemName');
                        $cartItem['itemPrice'] = $request->input('itemPrice');
                        $cartItem['itemCount'] = $request->input('itemCount');
                        $cartItem['itemImg'] = $request->input('itemImg');

                        //新規アイテム保存
                        $request->session()->push("cartItem", $cartItem);
                        return redirect('/cart');
                    }

        //カート追加リクがないときはアイテム詳細画面
        }else{

        $UtilityItem_api = new UtilityItemApi();
        $itemCode = $request->input('itemCode');

        $result = $request->all();
        $selectedItemCode = $result['itemCode'];

        $hits = $UtilityItem_api->Get_Item_Details($selectedItemCode);
        return view('shopping.item')->with("hits",$hits);

        }
    }

    public function cart(Request $request)
    {

        //削除リクエストがあった時の処理
        if($request->has('deleteItem')){

            //削除アイテムコード
            $delete_item_code = $request->input('delete_itemcode');

            //カート内のアイテム
            $carts = $request->session()->get('cartItem');

            //削除するキーを求める
            for($i=0; $i<count($carts); $i++){
                if($carts[$i]['itemCode']===$delete_item_code){
                    $deleteIndex = $i;
                }
            }

            //商品コードと合致したキーを取得し、配列から削除
            array_splice($carts, $deleteIndex, 1);

            $request->session()->forget('cartItem');
            $request->session()->put("cartItem", $carts);
            $carts = $request->session()->get('cartItem');

            return redirect('/cart');

        //再計算がリクエストされた時の処理
        }else if($request->has('itemChange') && $request->has('confirmItemCode')){

            //更新された数量
            $itemNumber = $request->input('Countitem');

            //もし10個以上、または数字以外だったら書き換えない
            if(($itemNumber>10 || $itemNumber<=0) || ctype_digit($itemNumber)==false){
                return redirect('/cart');

            //それ以外の場合
            }else{
            //カートの中身を参照し、同一の商品コードがあるか検索
                $carts = $request->session()->get('cartItem');

                for($i=0; $i<count($carts); $i++){
                    if( $request->input('confirmItemCode') === $carts[$i]['itemCode'] ){
                        $carts[$i]['itemCount'] = $itemNumber;
                    }
                }
                $request->session()->forget('cartItem');
                $request->session()->put("cartItem", $carts);
                return redirect('/cart');
            }

        //カート一覧表示
        }else{
            $carts = $request->session()->get('cartItem');

            //カート画面では最新順に並び替えて表示
            $carts = array_reverse($carts,false);

            
            return view('shopping.cart')->with("carts",$carts);
        }
    }

    public function confirm(Request $request)
    {
        //確認画面
        $carts = $request->session()->get('cartItem');

        //カート画面では最新順に並び替えて表示
        $carts = array_reverse($carts,false);
        return view('shopping.confirm')->with("carts",$carts);
    }

    public function complete(Request $request)
    {

        //完了画面でセッションクリア
        $request->session()->forget('cartItem');

        //完了画面表示
        return view('shopping.complete');

    }

}
