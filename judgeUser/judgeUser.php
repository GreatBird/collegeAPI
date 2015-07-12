<?php
include '../con.php';

    global $sql;
    global $tempColumn;
    global $tempValues;

    $sql=$sql."insert into judge_user ";
    foreach ($_POST as $key => $value) {
        $tempColumn=$tempColumn.$key.' , ';
        $tempValues=$tempValues.'\''.$value.'\''.' , ';
    }
    $sql=$sql.' ('.substr($tempColumn, 0,-2).') '.'values'.' ('.substr($tempValues, 0,-2).' )';
    //echo $sql;
    $result=mysqli_query($conn,$sql);
    if ($result) {
    $arr = array ('code'=>1,'info'=>'judge user success'); 
    }else{
    $arr = array ('code'=>0,'info'=>'judge user fail'); 
    }
    
    //$arr = array ('code'=>1,'update success and nickname is '=>$nickname); 

    // $arr["json"]=json_encode($arr,JSON_UNESCAPED_UNICODE);
    echo json_encode($arr,JSON_UNESCAPED_UNICODE); 



$conn->close();

?>
