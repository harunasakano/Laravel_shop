<?php
namespace App\Lib;

class UtilityItemApi
{

    public function Get_Item_Details($itemCode)
    {

        $appid = config('yahoo_api.appid');
        
        if ($itemCode != "") {
            $item4url = rawurlencode($itemCode);
            $volume = "large";
            
            $url = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=".$appid."&responsegroup=".$volume."&itemcode=".$item4url;
            $xml = simplexml_load_file($url);
            $hits = $xml->Result->Hit;
        }
        
        return $hits;
           
    }
}