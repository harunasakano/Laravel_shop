<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <link href="css/shopping.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/topValidation.js"></script>
        <title>LaraShop</title>
    </head>
    <body>
            <h1><span class="maintitle">LaraShop</span></h1>
            <h2>決済選択・注文内容確認</h2>
            　<div class="container">
             　<div class="pay-wrapper">
             <form method="get" name="completeform" action="{{ url('/complete')}}" id="completeform">
                <h3>決済方法の選択</h3>
                <p>
                <input type="radio" name="kessai" value="daibiki" checked="checked">代引き</p>
                <p>
                <input type="radio" name="kessai" value="ginhuri" >銀行振込
                </p>
               </div>

                <div class="send_point">
                  <h3>お届け先</h3>
                  <p>ここに住所が入ります</p>
                </div>

                <div class="cartList">
                  <h3>購入商品</h3>
                    <table>
                      <tr>
                        <th>商品</th>
                        <th>単価</th>
                        <th>個数</th>
                        <th>小計</th>
                      </tr>
                            @for ($i=0; $i<count($carts); $i++)
                            <tr>
                              <td class="item_name">
                               <div class="name_item">
                                   <a href="{{ url('/item?itemCode='.$carts[$i]['itemCode']) }}">{{{ $carts[$i]['itemName'] }}}</a>
                                 </div>
                                 <div class="goods_img">
                                   <img src="https://pics.prcm.jp/998ccf344e34a/75562369/jpeg/75562369_220x195.jpeg" alt="{{ $carts[$i]['itemName'] }}" class="goodsImage">
                                 </div>
                              </td>
                              <td class="item_price">{{{ $carts[$i]['itemPrice'] }}}円</td>
                              @isset($itemnumber)
                              <td class="item_count">{{{ $itemnumber }}}個
                              <input type="hidden" name="confirmItemCode" value="{{{ $carts[$i]['itemCode'] }}}">
                              @endisset
                              <td class="item_count">{{{ $carts[$i]['itemCount'] }}}個
                              <input type="hidden" name="confirmItemCode" value="{{{ $carts[$i]['itemCode'] }}}">
                              </td>
                              <td class="item_total_price">{{{ $carts[$i]['itemPrice']*$carts[$i]['itemCount'] }}}円</td>
                              <input type="hidden" name="delete_itemcode" value={{{ $carts[$i]['itemCode'] }}}>
                            </tr>
                            @endfor
                        </table>
                    </div>

                <h4 class="check_title">注文内容確認&ensp;<span class ="requiredtext">※必須</span></h4>
                <p class="buy_check">
                  <input type="checkbox" id="agree_check" >
                  <label for="agree_check" class="agreetext">この内容で購入します。</label>
                </p>

                <div class="comp_button">
                  <button class="buyBtn" type="submit" id="buyBtn">オーダーする！</button>
                </div>

                 <div class="backtop">
                    <a href={{ url('/') }}>TOPに戻る</a>
                 </div>
            </div>
           </form>
    </body>
</html>
