<?php

$access_token = "UtI7u6jYKU0G0P7KbZIVKE5DArS7DAKtkIExZaWfhEF-BRP8S13a6TMuAZhDVfTwTQAzf75icpg1s52LMnJi-Dg9Eiuj_CS0huI9nq8haqY";

$jsonmenu = '{
     "button":[
     {	
          "type":"view",
          "name":"博物馆",
          "url":"http://www.baidu.com"
      },
     {
          "name":"特色展品",
          "sub_button":[
           {
              "type":"click",
              "name":"随便看看",
              "key":"r_view"
           },
           {
              "type":"click",
              "name":"指定",
              "key":"p_view"
           }]
      },
      {
           "type":"click",
           "name":"反馈",
           "key":"fback"
      }
]
 }';


$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;

$result = https_request($url, $jsonmenu);
var_dump($result);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

?>