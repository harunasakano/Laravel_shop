<?php

namespace App\Lib;


class UtilityApi
{

  public function Get_query_result($queryWord,$sort,$category_id)
  {

    $appid = config('yahoo_api.appid');
    $hits = array();

    //商品検索API
    if ($queryWord != "") {
        $query4url = rawurlencode($queryWord);
        $sort4url = rawurlencode($sort);
        $url = 'https://shopping.yahooapis.jp/ShoppingWebService/V3/itemSearch?appid='.$appid.'&query='.$query4url.'&genre_category_id='.$category_id.'&sort='.$sort4url;
        $res = file_get_contents($url);
        $json = json_decode($res);

    if ($json->totalResultsReturned != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
        $hits = $json->hits;
    }
    }
    return $hits;
  }

}
