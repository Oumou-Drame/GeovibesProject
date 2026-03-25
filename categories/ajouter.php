<?php
session_start();
include "../config/database.php";

if(!isset($_SESSION['user_id'])){
   // echo"You are not an admin";
    header("Location: ../auth/connexion.php");

}else {
    if($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "editeur"){

        if(isset($_POST['submit'])){

            $name = $_POST['name'];
            $sql = "INSERT INTO categories(nomcatg) VALUES('$name')";
            $result = $pdo->query($sql);
            if(!$result){
                echo"Error!: {$pdo->error}";
            }else {
                echo"Category added successfully";
            }
        }
    }else{
        header("Location: ../auth/connexion.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../categories/ajouter.php" method="POST">
        <input type="text" name="name" required>
        <input type="submit" name="submit" value="Ajouter une catégorie">
    </form>
    <a href="../categories/afficher.php">Retour au menu</a>
</body>
</html>