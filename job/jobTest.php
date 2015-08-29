<?php     
// date_default_timezone_set('PRC'); //默认时区     
// echo "今天:",date("Y-m-d",time()),"<br>";     
// echo "昨天:",date("Y-m-d",strtotime("-2 day")), "<br>";     
// echo "明天:",date("Y-m-d",strtotime("+1 day")), "<br>";     
// echo "一周后:",date("Y-m-d",strtotime("+1 week")), "<br>";     
// echo "一周零两天四小时两秒后:",date("Y-m-d G:H:s",strtotime("+1 week 2 days 4 hours 2 seconds")), "<br>";     
// echo "下个星期四:",date("Y-m-d",strtotime("next Thursday")), "<br>";     
// echo "上个周一:".date("Y-m-d",strtotime("last Monday"))."<br>";     
// echo "一个月前:".date("Y-m-d",strtotime("last month"))."<br>";     
// echo "一个月后:".date("Y-m-d",strtotime("+1 month"))."<br>";     
// echo "十年后:".date("Y-m-d",strtotime("+10 year"))."<br>";   


include "helper.php";  
//function getDistance($lat1, $lng1, $lat2, $lng2) 
//     function getDistance($lat1, $lng1, $lat2, $lng2, $len_type = 1, $decimal = 2)
//118.814771#31.988162  120.738459#31.321361
echo getDistance(31.988162, 118.814771, 31.321361, 120.738459) ;
//echo getDistance(30, 50, 50, 100, $len_type = 2, $decimal = 2);
?>