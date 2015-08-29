<?php
include '../con.php';

    global $sql;
    $finalArr=array();

    $sql='SELECT distinct category1 as cate from post where 1';
    
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    
    if ($result) {
             while($row = mysqli_fetch_array($result))
                { 
                    array_push($finalArr, $row['cate']);
                }

    }
   
    echo json_encode($finalArr,JSON_UNESCAPED_UNICODE); 



$conn->close();

?>
