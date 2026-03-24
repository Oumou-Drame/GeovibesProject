<?php
session_start();
include"../config/database.php";
$sql = "SELECT * FROM posts";
$result = mysqli_query($connexion,$sql);
 echo'
   <ul>
        <li><a href="../pages/editeur.php">Retour à la page editeur</a></li>
    </ul>';

while($row = mysqli_fetch_assoc($result)){
    echo"{$row['title']} <br>"; 
    echo"{$row['contentText']} <br>";
    echo"<img src='../images/{$row['image']}'> <br>";
    $post_id = $row['id'];
    echo"<a href='modifier.php?post_id={$post_id}'>modifier</a> <br>";
    echo"<a href='supprimer.php?post_id={$post_id}'>supprimer</a> <br>";
}
?>
