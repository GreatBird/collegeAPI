
<?php

include '../con.php';

$nickname=$_POST['nickname'];

if (strlen($nickname)>0 ){
	
$selectS = mysqli_query($conn,"SELECT * FROM user WHERE nickname='$nickname'");


global $usern;
global $pass;
global $realname;
global $qq;
global $phone;
global $address;
global $sex;
global $school;
global $major;
global $skills;

while($row = mysqli_fetch_array($selectS))
{
      $pass=$row['password'];
      $usern=$row['nickname'];
      $realname=$row['realname'];
      $qq=$row['qq'];
      $phone=$row['phone'];
      $address=$row['address'];
      $sex=$row['sex'];
      $school=$row['school'];
      $major=$row['major'];
      $skills=$row['skills'];

}
if ($nickname==$usern) {
    $arr = array ('code'=>1,'username'=>$usern,'password'=>$pass,'realname'=>$realname,'qq'=>$qq,'phone'=>$phone,'address'=>$address,'sex'=>$sex,'school'=>$school,'major'=>$major,'skills'=>$skills); 
}else{
    $arr = array ('code'=>0,'msg'=>'用户名不存在'); 
}

}
else{
        $arr = array ('code'=>0,'msg'=>'用户名不能为空'); 

}
        $arr["json"]=json_encode($arr,JSON_UNESCAPED_UNICODE);
        echo json_encode($arr,JSON_UNESCAPED_UNICODE); 



$conn->close();

?>
