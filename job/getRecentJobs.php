<?php
include '../con.php';
date_default_timezone_set('PRC'); //默认时区     
    global $sql;
    $arr=array();
    $finalArr=array();
    $today=date("Y-m-d",time());
    if (isset($_POST['date'])) {
      $date=intval($_POST['date']);
      $beforeDate=date("Y-m-d",strtotime("-$date day"));
    }else{
      $beforeDate=date("Y-m-d",strtotime("-3 day"));
    }
    $sql="select * from post where 1 and publish_time between '$beforeDate' and '$today'";
    
    //echo $sql;

    $result = mysqli_query($conn,$sql);
    
    if ($result) {
             $count=0;

             while($row = mysqli_fetch_array($result))
                { 
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
        $arr['code']=0;
        $arr['info']='query failed,reason is incorrect column name!';
    }

   
    echo json_encode($finalArr,JSON_UNESCAPED_UNICODE); 



$conn->close();

?>
