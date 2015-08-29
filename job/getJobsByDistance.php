<?php
include '../con.php';
include "helper.php";
date_default_timezone_set('PRC'); //默认时区     

$id=$_POST['post_id'];
$targetDistance=intval($_POST['distance']);

$result0 = mysqli_query($conn,"select lng_lat from post where id=$id");

while ($row0=mysqli_fetch_array($result0)) {
  $lng_lat=explode('#', $row0['lng_lat']);
}
//print_r($lng_lat);
$lng=doubleval($lng_lat[0]);
$lat=doubleval($lng_lat[1]);






// echo $lng;
// echo "<br>";
// echo $lat;

    global $sql;
    $arr=array();
    $finalArr=array();
    $today=date("Y-m-d",time());
    if (isset($_POST['date'])) {
      $date=intval($_POST['date']);
      $beforeDate=date("Y-m-d",strtotime("-$date day"));
    }else{
      $beforeDate=date("Y-m-d",strtotime("-30 day"));
    }
    $sql="select * from post where 1 and publish_time between '$beforeDate' and '$today'";
    
    //echo $sql;

    $result = mysqli_query($conn,$sql);
    
    if ($result) {
             $count=0;

             while($row = mysqli_fetch_array($result))
                { 

                      if ($row['lng_lat']!=null && strlen($row['lng_lat'])>0) {
                        $lng_latTemp=explode('#', $row['lng_lat']);
                        $lngTemp=doubleval($lng_latTemp[0]);
                        $latTemp=doubleval($lng_latTemp[1]);
                        //print_r($lng_latTemp);
                        $distance=getDistance($lat, $lng, $latTemp, $lngTemp).'///';

                            if ($distance>0 && $distance<$targetDistance) {
                              foreach ($row as $key => $value) {
                              if (!is_int($key)) {
                                  //echo 'key is '.$key.' and value is '.$value.'<br>';
                                  $arr[$key]=$value;
                              }
                              //echo 'key is '.$key.' and value is '.$value.'<br>';
                              
                            }

                            $finalArr[$count]=$arr;
                            //echo 'count is '.$count;
                              $count=$count+1;

                            }


                      }else{
                        $finalArr['code']=0;
                        $finalArr['info']='lng_lat is null or no result';
                      }
                   



                      
                }
       


    }else{
        $arr['code']=0;
        $arr['info']='query failed,reason is incorrect column name!';
    }

   
    echo json_encode($finalArr,JSON_UNESCAPED_UNICODE); 



$conn->close();

?>
