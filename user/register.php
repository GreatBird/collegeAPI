
<?php

include '../con.php';

$nickname=$_POST['nickname'];
$password=$_POST['password'];
$realname=$_POST['realname'];

$phone=$_POST['phone'];
$address=$_POST['address'];

$qq=$_POST['qq'];
$school=$_POST['school'];
$major=$_POST['major'];
$skills=$_POST['skills'];

$result=mysqli_query($conn,"insert into user(nickname,password,realname,phone,qq,school,major,skills) values('$nickname','$password','$realname','$phone','$qq','$school','$major','$skills')");

if ($result) {
    $arr = array ('code'=>1,'nickname'=>$nickname); 
}else{
	$arr = array ('code'=>0,'errorInfo'=>"insert fail"); 

}

$arr["json"]=json_encode($arr,JSON_UNESCAPED_UNICODE);
echo json_encode($arr,JSON_UNESCAPED_UNICODE); 






$conn->close();

?>
