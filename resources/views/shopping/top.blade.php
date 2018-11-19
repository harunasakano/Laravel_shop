<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <link href="css/shopping.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/topValidation.js"></script>
        <title>LaraShop</title>
    </head>
    <body>
        <div class="container">
            <h1>LaraShop</h1>
            <form name="queryform" action="{{ url('/search') }}" method="GET" id="queryform">
            <div class="searchForm">
                キーワード検索：
                <select name="category_id" id="category_id" required/>
                    @foreach ($categories as $category_id => $category)
                        <option value="{{{ $category_id }}}">{{{ $category }}}</option>
                    @endforeach
                </select>
            </div>
            <div class="sortForm">
              表示順序:
              <select name="sort" id="sort" required/>
                  @foreach ($sortOrders as $sortOrder_key => $sortOrder)
                      <option value="{{{ $sortOrder_key }}}">{{{ $sortOrder }}}</option>
                  @endforeach
              </select>
            </div>
            <div class="sortForm">
            <input class="search-box" type="text" name="query_word" value="" id="query_word" placeholder="キーワードを入力">
            </div>
            <div class="searchButton">
                <button class="search-button" type="submit" id="button">Yahooショッピングで検索</button>
            </div>
            </form>
        </div>
    </body>
</html>
