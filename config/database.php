<?php
$server ="localhost";
$user = "root";
$pass = "";
$dbname = "blogpostdb";

//$connexion = new mysqli($server,$user,$pass,$dbname);
//if(!$connexion){
  //  echo"error {$connexion -> connect_error}!";
//}else {
  //  echo"connection is done";
//}
try {
$connexion = new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
 $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erreur connexion : " . $e->getMessage());
}
?>