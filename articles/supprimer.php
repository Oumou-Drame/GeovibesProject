<?php
    session_start();
    include "../config/database.php";
    $post_id = $_GET['post_id'];
    $sql = "DELETE FROM posts where id = $post_id";
    $result = $connexion->query($sql);
    if(!$result){
        echo"error! {$connexion->error}";
    }else{
        echo "Deleted successfully!";
    }
?>