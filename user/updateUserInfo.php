<?php
include '../con.php';
$nickname=$_POST['nickname'];
if ($nickname!=null && strlen($nickname)>0) {
    global $usern;
    $selectS = mysqli_query($conn,"SELECT * FROM user WHERE nickname='$nickname'");
    while($row = mysqli_fetch_array($selectS))
    {
      $usern=$row['nickname'];
    }
    //验证数据库中是否有数据
    if ($nickname==$usern) {
        global $sql;
        $sql=$sql."update user set ";
        foreach ($_POST as $key => $value) {
            $sql=$sql.$key.' = '.'\''.$value.'\''.' ,';
        }
        $sql= substr($sql,0,strlen($sql)-1); 
        $sql=$sql."where nickname='$nickname'";
        //echo $sql;
        mysqli_query($conn,$sql);
        $arr = array ('code'=>1,'info'=>'update success and nickname is '.$nickname); 
    }else{
        $arr = array ('code'=>0,'info'=>'update failed nickname not exist'); 
    }
        //$arr["json"]=json_encode($arr,JSON_UNESCAPED_UNICODE);
        echo json_encode($arr,JSON_UNESCAPED_UNICODE); 
}


$conn->close();

?>
