
<?php

include '../con.php';

$nickname=$_POST['nickname'];
$password=$_POST['password'];
if (strlen($nickname)>0&&strlen($password)>0) {
	
$selectS = mysqli_query($conn,"SELECT * FROM user WHERE nickname='$nickname'");

global $usern;
global $pass;
while($row = mysqli_fetch_array($selectS))
{
      $pass=$row['password'];
      $usern=$row['nickname'];
}

if($nickname==$usern){
	if($pass==$password){
		session_start();
        $_SESSION["nickname"]=$nickname;
	    $arr = array ('code'=>1,'nickname'=>$nickname); 
		}else{
	    $arr = array ('code'=>0,'msg'=>'密码错误'); 
    }
}

else{
        $arr = array ('code'=>0,'msg'=>'用户名不存在'); 
}
}
else{
        $arr = array ('code'=>0,'msg'=>'用户名或者密码不能为空'); 

}
        //$arr["json"]=json_encode($arr,JSON_UNESCAPED_UNICODE);
        echo json_encode($arr,JSON_UNESCAPED_UNICODE); 





$conn->close();

?>
