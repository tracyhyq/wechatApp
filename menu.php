<?php

$appid="wxbfd00733a7df9702";//填写appid
$secret="b7a761a7fa6050fd6cc1b47f14ba879b";//填写secret

$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$a = curl_exec($ch);


$strjson=json_decode($a);
$token = $strjson->access_token;
$post="{
     \"button\":[
     {	
          \"type\":\"click\",
          \"name\":\"当季水果\",
            \"sub_button\":[
            {
               \"type\":\"click\",
               \"name\":\"优惠信息\",
               \"key\":\"key_yhxx\"
            },
            {
               \"type\":\"click\",
               \"name\":\"热销水果\",
               \"key\":\"key_rxsg\"
            }
           
            ]
      },
      {	
          \"type\":\"click\",
          \"name\":\"店铺信息\",
           \"sub_button\":[
            {
               \"type\":\"click\",
               \"name\":\"店铺地址\",
               \"key\":\"key_dpdz\"
            },
            {
               \"type\":\"click\",
               \"name\":\"联系电话\",
               \"key\":\"key_lxdh\"
            }
            
            ]
      },
        
           {
           \"type\":\"click\",
           \"name\":\"生活帮手\",
           \"sub_button\":[
            {
               \"type\":\"click\",
               \"name\":\"天气查询\",
               \"key\":\"key_tqcx\"
            },
            {
               \"type\":\"view\",
               \"name\":\"百度翻译\",
               \"url\":\"http://fanyi.baidu.com/#auto/zh/\"
            },
            {
               \"type\":\"view\",
               \"name\":\"搞笑图片\",
               \"url\":\"http://image.baidu.com/channel/funny#%E6%90%9E%E7%AC%91&%E5%85%A8%E9%83%A8&5&0\"
            },
            {
               \"type\":\"view\",
               \"name\":\"每日笑话\",
               \"url\":\"http://day.2345.com/\"
            },
            {
               \"type\":\"click\",
               \"name\":\"音乐推荐\",
               \"key\":\"key_yytj\"
            }]
       }]
 }";  //提交内容
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$token}"; //查询地址 
$ch = curl_init();//新建curl
curl_setopt($ch, CURLOPT_URL, $url);//url  
curl_setopt($ch, CURLOPT_POST, 1);  //post
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post内容  
curl_exec($ch); //输出   
curl_close($ch); 

?>