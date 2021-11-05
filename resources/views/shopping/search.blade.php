<html>
    <head>
    <title>LaraShop</title>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <link href="css/shopping.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <h1><span class="maintitle">LaraShop</span></h1>
            @for ($i=0; $i<count($hits); $i++)
            <form method="get" name="formSearch{{ $i }}" action="{{ url('/item') }}">
                <input type="hidden" value="{{{ $hits[$i]->code }}}" name="itemCode">
                <h3><a href="javascript:formSearch{{ $i }}.submit()">{{{ $hits[$i]->name }}}</a></h3>
                <div><a href="javascript:formSearch{{ $i }}.submit()"><img src="{{{ $hits[$i]->image->medium }}}" /></a></div>
                <p class="price">価格：{{{ $hits[$i]->price }}}円</p>
                <p class="itemDescription">{{{ $hits[$i]->description }}}</p>
            </form>
            @endfor
            <div class="backtop">
                <a href={{ ('/') }}> << 戻る</a>
            </div>
        </div>
    </body>
</html>
