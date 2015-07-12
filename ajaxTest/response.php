<?php
// if (is_ajax()) {
//   if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
//     $action = $_POST["action"];
//     echo $action;
//     switch($action) { //Switch case for value of action
//       case "test": test_function(); break;
//     }

//   }



// }

test_function();

//Function to check if the request is an AJAX request
// function is_ajax() {
//   return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
// }

function test_function(){
  $input = $_POST;
  

  if ($input["username"]=="zp"&&$input["password"]=="zp") {
    $return["message"]="true";
        $return["code"]="0";

  }else{
        $return["message"]="false";
                $return["code"]="1";

  }
  
  $return["json"] = json_encode($return);
  echo json_encode($return);
}
?>