<?php

function rand6() { 
 
 //$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; 

  $chars='123456789'; 


 mt_srand((double)microtime()*1000000*getmypid()); 

 $password="";
 while(strlen($password)<6)
    $password.=substr($chars,(mt_rand()%strlen($chars)),1);
 return $password;
 } 


?>