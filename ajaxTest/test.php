
<?php

//echo json_decode($_POST);

// $array = array('lastname', 'email', 'phone');
// $comma_separated = implode(",", $_POST['test']);

// // $arr = array ('code'=>0,'msg'=>$_POST['nickname']); 
// $arr = array ('code'=>0,'msg'=>$_POST['test']); 
//$data = json_decode($_POST['test'],true); 


// $test=$GLOBALS['HTTP_RAW_POST_DATA'];

global $finalStrKey;
global $finalStrValue;
 $test=file_get_contents("php://input");
 $data = json_decode($test,true); 

 foreach ($data as $key => $value) {
        $finalStrKey=$finalStrKey.$key.'|';
        $finalStrValue=$finalStrValue.$value.'|';
    }


$arr = array ('code'=>0,'msg'=>$finalStrValue); 

//echo $data;
echo json_encode($arr,JSON_UNESCAPED_UNICODE); 

?>
