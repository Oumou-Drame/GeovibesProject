<?php
    session_start();
    include "../config/database.php";
    $sql = "SELECT * FROM categories";
    $result = $connexion->query($sql);
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo"{$row['name']}";
        echo"<br>";
         $categorie_id = $row['id'];
    echo"<a href='modifier.php?categorie_id={$categorie_id}'>modifier</a> <br>";
    echo"<a href='supprimer.php?categorie_id={$categorie_id}'>supprimer</a> <br>";
    }
?>
