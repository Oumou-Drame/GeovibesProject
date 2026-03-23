<?php
$server ="localhost";
$user = "root";
$pass = "";
$dbname = "blogpostdb";

$connexion = new mysqli($server,$user,$pass,$dbname);
//if(!$connexion){
  //  echo"error {$connexion -> connect_error}!";
//}else {
  //  echo"connection is done";
//}
?>