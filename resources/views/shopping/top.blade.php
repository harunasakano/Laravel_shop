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
            <h1><span class="maintitle">LaraShop</span></h1>
            <form name="queryform" action="{{ url('/search') }}" method="GET" id="queryform">
            <p class="formTitle">カテゴリ</p>
            <div class="categoryBox cp_sl01">
                <select name="category_id" id="category_id" required/>
                    @foreach ($categories as $category_id => $category)
                        <option value="{{{ $category_id }}}">{{{ $category }}}</option>
                    @endforeach
                </select>
            </div>
            <p class="formTitle">表示順</p>
            <div class="sortBox cp_sl01">
              <select name="sort" id="sort" required/>
                  @foreach ($sortOrders as $sortOrder_key => $sortOrder)
                      <option value="{{{ $sortOrder_key }}}">{{{ $sortOrder }}}</option>
                  @endforeach
              </select>
            </div>
            <p class="formTitle">検索キーワード&ensp;<span class="requiredtext">※必須</span></p>
            <div class="wordsBox">
              <label class="textef">
                <input type="text" name="query_word" value="" id="query_word" placeholder="キーワードを入力">
            </div>
            <div class="searchButton">
                <button class="search-button" type="submit" id="button">ショップで検索</button>
            </div>
            </form>
        </div>
    </body>
</html>
