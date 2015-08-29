<?php 
include "../con.php";
$nickname=$_POST['nickname'];
$finalArr=array();
$result=mysqli_query($conn,"select * from photo_user where nickname='$nickname'");
while ($row=mysqli_fetch_array($result)) {
	array_push($finalArr, $row['photo_address']);
}

echo json_encode($finalArr,JSON_UNESCAPED_UNICODE);

$conn->close();

?>