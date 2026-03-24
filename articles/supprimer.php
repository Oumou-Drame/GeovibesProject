<?php
    session_start();
    include "../config/database.php";

    if (isset($_GET['post_id'])) {
        $id = $_GET['post_id'];
    
        $sql = "DELETE FROM articles where id = ?";

        $result = $pdo->prepare($sql);
        $result->execute(['$id']);

        if(!$result){
            echo"error! {$pdo->error}";
        }else{
            echo "Deleted successfully!";
        }
    }
?>