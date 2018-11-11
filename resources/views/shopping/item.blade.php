<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <link href="css/shopping.css" rel="stylesheet" type="text/css">
        <title>KAGOYUME_EC</title>
    </head>
    <body>
        <div class="container">
            <h1>KAGOYUME_EC</h1>
                @foreach ($hits as $hit)
                <div class="itemDetail">
                    <h3>{{{ $hit->Name }}}</h3>
                    <div class="itmImg">
                        <img border="1" src="{{ $hit->Image->Small }}" width="128" height="128" alt="商品画像" title="{{ $hit->Name }}">
                    </div>
                    <div class="itemPrice">
                        価格:{{{ $hit->Price }}}円
                    </div>
                    <div class="itemReview">
                        レビュー平均評価:{{{ $hit->Review->Rate }}}
                    </div>
                    <div class="itemDescription">
                        <h5>詳細</h5>
                        <p class="itemDescriptionText">{{{ strip_tags($hit->Description) }}}</p>
                    </div>
                </div>
                @endforeach
            <form method="get" name="formcart" action="{{ url('/item') }}">
            <div class="cartBtn">
                <div class="countSelect">
                        <p>数量：
                        <select name="itemCount" class="itemCountSelect">
                            @for ($i=1; $i<=10; $i++)
                            <option value={{{ $i }}}>{{{ $i }}}</option>
                            @endfor
                        </select>
                        </p>
                </div>
                    @foreach ($hits as $hit)
                    <input type="hidden" name="itemCode" value={{{ $hit->Code }}}>
                    <input type="hidden" name="itemName" value={{{ $hit->Name }}}>
                    <input type="hidden" name="itemPrice" value={{{ $hit->Price }}}>
                    <a href="javascript:formcart.submit()" class="buyBtn">カートに入れる</a>
                    @endforeach
            </div>
            </form>
        </div>
    </body>
</html>