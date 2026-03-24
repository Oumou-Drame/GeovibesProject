<?php
    session_start();
    include "../config/database.php";

    $id = $row['id'];
    
    $sql = "DELETE FROM articles where id = ?";

    $result = $pdo->prepare($sql);
    $result->execute(['$id']);

    if(!$result){
        echo"error! {$connexion->error}";
    }else{
        echo "Deleted successfully!";
    }
?>