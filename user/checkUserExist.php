
<?php

include '../con.php';

$nickname=$_POST['nickname'];
if (strlen($nickname)>0) {
	
$selectS = mysqli_query($conn,"SELECT * FROM user WHERE nickname='$nickname'");
$selectS1 = mysqli_query($conn,"SELECT * FROM shopDetail WHERE nickname='$nickname'");


global $usern;
global $usern1;

while($row = mysqli_fetch_array($selectS))
{
      $usern=$row['nickname'];
}

while($row1 = mysqli_fetch_array($selectS1))
{
      $usern1=$row1['nickname'];
}

if ($usern1==$nickname||$usern==$nickname) {
    $arr = array ('code'=>0,'msg'=>'nickname already exist!'); 
}else{
    $arr = array ('code'=>1,'msg'=>'nickname does not exist!'); 
}



}
else{
        $arr = array ('code'=>0,'msg'=>'用户名不能为空'); 

}
        //$arr["json"]=json_encode($arr,JSON_UNESCAPED_UNICODE);
        echo json_encode($arr,JSON_UNESCAPED_UNICODE); 





$conn->close();

?>
