<?php
$output_dir = "../uploads/";
include '../con.php';
global $nickname;
global $tempName;
$nickname=$_POST['nickname'];

$selectS = mysqli_query($conn,"SELECT * FROM photo_user WHERE nickname='$nickname'");

while($row = mysqli_fetch_array($selectS))
    {
          $tempName=$row['nickname'];
    }


if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
   {

    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
            $RandomNum   = time();

            $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
            $ImageType      = $_FILES['myfile']['type']; //"image/png", image/jpeg etc.

            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

       	 	move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
       	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];
   	 	    $ret[$NewImageName]= $output_dir.$NewImageName;
            //如果存在记录，那么更新，如果不存在，那么添加
            if ($nickname==$tempName) {
                mysqli_query($conn,"update  photo_user set photo_address='ret[$NewImageName]' where nickname='$nickname'");
            }else{
                //将图片路径插入数据库
                mysqli_query($conn,"insert into photo_user (nickname,photo_address) values('$nickname','ret[$NewImageName]');");
            }
                echo $ret[$NewImageName];

            
    	}
    	else
    	{
            $fileCount = count($_FILES["myfile"]['name']);
    		for($i=0; $i < $fileCount; $i++)
    		{
                $RandomNum   = time();

                $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i]));
                $ImageType      = $_FILES['myfile']['type'][$i]; //"image/png", image/jpeg etc.

                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

                $ret[$NewImageName]= $output_dir.$NewImageName;
    		    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$NewImageName );
                echo $output_dir.$NewImageName;
    		}
    	}
    }
    //echo json_encode($ret);

}

$conn->close();
?>