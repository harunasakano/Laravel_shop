<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <link href="css/shopping.css" rel="stylesheet" type="text/css">
        <title>KAGOYUME_EC</title>
    </head>
    <body>
        <div class="container">
            <h1>KAGOYUME_EC</h1>
            <form action="{{ url('/search') }}" method="GET">
            <div class="searchForm">
                キーワード検索：
                <select name="category_id">
                    @foreach ($categories as $category_id => $category)
                        <option value="{{{ $category_id }}}">{{{ $category }}}</option>
                    @endforeach
                </select>
            </div>
            <div class="sortForm">
              表示順序:
              <select name="sort">
                  @foreach ($sortOrders as $sortOrder_key => $sortOrder)      
                      <option value="{{{ $sortOrder_key }}}">{{{ $sortOrder }}}</option>
                  @endforeach
              </select>
            </div>
            <div class="sortForm">
            <input type="text" name="query_word" value="">
            </div>
            <div class="searchButton">
                <input type="submit" value="Yahooショッピングで検索"/>
            </div>
            </form>
        </div>
    </body>
</html>