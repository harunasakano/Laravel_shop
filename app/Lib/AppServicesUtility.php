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
        $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url";
        $xml = simplexml_load_file($url);

    if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
        $hits = $xml->Result->Hit;
    }
    }
    return $hits;
  }

}
