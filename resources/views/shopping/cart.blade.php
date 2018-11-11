<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <link href="css/shopping.css" rel="stylesheet" type="text/css">
        <title>KAGOYUME_EC</title>
    </head>
    <body>
            <div class="container">
                <h1>KAGOYUME_EC</h1>
                <h3>カート一覧</h3>
                    <div class="cartList">
                        <table>
                          <tr>
                            <th>商品</th>
                            <th>単価</th>
                            <th>個数</th>
                            <th>小計</th>
                        　</tr>
                            @for ($i=0; $i<count($carts); $i++)
                            <form method="get" name="formCartEdit{{ $i }}" action="{{ url('/cart')}}">
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
                              <td class="item_count"><input type="text" name="Countitem" class="editCount" value="{{{ $itemnumber }}}">個
                              <input type="hidden" name="confirmItemCode" value="{{{ $carts[$i]['itemCode'] }}}">
                              @endisset
                              <td class="item_count"><input type="text" name="Countitem" class="editCount" value="{{{ $carts[$i]['itemCount'] }}}">個
                              <input type="hidden" name="confirmItemCode" value="{{{ $carts[$i]['itemCode'] }}}">
                              <button type='submit' name='itemChange' value='change' class="changeCount">再計算</button>
                              </td>
                              <td class="item_total_price">{{{ $carts[$i]['itemPrice']*$carts[$i]['itemCount'] }}}円</td>
                              <input type="hidden" name="delete_itemcode" value={{{ $carts[$i]['itemCode'] }}}>
                              <td class="deleteButton"><button type='submit' name='deleteItem' value='delete' onclick="return confirm('カートから削除します。よろしいですか？')">削除</button></td>
                            </tr>
                            </form>
                            @endfor
                        </table>
                    </div>
                 <div class="backtop">
                    <a href={{ url('/') }}>かごゆめTOPに戻る</a>
                 </div>
            </div>
    </body>
</html>