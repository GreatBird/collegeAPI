<?php 
$output_dir = "../uploads/";
include '../con.php';
$finalArr=array();
$ret=array();
//print_r($_FILES);
$id=$_POST['post_id'];

foreach ($_FILES as $key => $value) {
	//echo $_FILES["$key"]['name'];
	$RandomNum   = time();

            $ImageName      = str_replace(' ','-',strtolower($_FILES["$key"]['name']));
            $ImageType      = $_FILES["$key"]['type']; //"image/png", image/jpeg etc.

            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

       	 	move_uploaded_file($_FILES["$key"]["tmp_name"],$output_dir. $NewImageName);
       	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];

	       	 	 $ret[$NewImageName]= $output_dir.$NewImageName;
                 $address=$ret[$NewImageName];
                 //echo $ret[$NewImageName];
                 $sql="insert into photo_post (post_id,photo_address) values('$id','$address')";
                 //echo $sql;
                     // $result=mysqli_query($conn,$sql);
                     // if ($result) {
                     //    echo "success";
                     // }else{
                     //    echo "fail";
                     // }
                 array_push($finalArr, $address);

}
						$finalArr['info']='success';
                        echo json_encode($finalArr,JSON_UNESCAPED_UNICODE);

$conn->close();

?>