<?php
    session_start();
    include "../config/database.php";
    $categorie_id = $_GET['categorie_id'];
    $sql = "DELETE FROM categories WHERE id = $categorie_id";
    $result = $connexion->query($sql);
     if(!$result){
        echo"error! {$connexion->error}";
    }else{
        echo "Deleted successfully!";
    }

?>
