<?php
include "db.php";


function HashPass(){

   $password=$_POST["password_hash"];
   $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
   return $hashed_pass;
}




?>