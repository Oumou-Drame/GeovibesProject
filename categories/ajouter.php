<?php
session_start();
include "../config/database.php";
if(!isset($_SESSION['user_id'])){
   // echo"You are not an admin";
    header("Location: ../auth/connexion.php");
}else {
    if($_SESSION['user_role'] == "admin"){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $sql = "INSERT INTO categories(name) VALUES('$name')";
            $result = $connexion->query($sql);
            if(!$result){
                echo"Error!: {$connexion->error}";
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
        <input type="submit" name="submit" value="AddCategory">
    </form>
    <a href="dashboard.php">Dashboard</a>
</body>
</html>
