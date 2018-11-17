<html>
    <head>
    <title>LaraShop</title>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <link href="css/shopping.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <h1>LaraShop</h1>
            @for ($i=0; $i<count($hits); $i++)
            <form method="get" name="formSearch{{ $i }}" action="{{ url('/item') }}">
                <input type="hidden" value="{{{ $hits[$i]->Code }}}" name="itemCode">
                <h3><a href="javascript:formSearch{{ $i }}.submit()">{{{ $hits[$i]->Name }}}</a></h3>
                <div><a href="javascript:formSearch{{ $i }}.submit()"><img src="{{{ $hits[$i]->Image->Medium }}}" /></a></div>
                <p class="itemDescription">{{{ $hits[$i]->Description }}}</p>
            </form>
            @endfor
        </div>
    </body>
</html>
