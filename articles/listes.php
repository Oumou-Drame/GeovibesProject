<?php
    session_start();
    include "../config/database.php";
    $sql = "SELECT id,title FROM posts";
    $result = $connexion ->query($sql);
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $id = $row['id']; 
        $title = $row['title'];
        echo"<a href='../articles/detail.php?id=$id'>$title</a>";
        echo"<br>";
      
    }

?>