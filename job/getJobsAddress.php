<?php 
include "../con.php";
$postID=$_POST['post_id'];
$finalArr=array();
$result=mysqli_query($conn,"select * from photo_post where post_id=$postID");
while ($row=mysqli_fetch_array($result)) {
	array_push($finalArr, $row['photo_address']);
}

echo json_encode($finalArr,JSON_UNESCAPED_UNICODE);

$conn->close();

?>