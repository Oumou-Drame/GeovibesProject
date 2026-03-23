<?php
session_start();
include "../config/database.php";
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connexion,$sql);
    if(!$result){
        echo"Error";
    }else{
        if($result->num_rows >0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_role'] = $row['role'];
            if($_SESSION['user_role'] =="author"){
                echo "Loged successful !";
                echo"Vous vous etes connectés en tant que editeur <br>";
                echo'<a href="../pages/editeur.php">Cliquer sur ce lien pour acceder à votre page</a>';
            }
            if($_SESSION['user_role'] == "admin"){
                echo"Vous vous etes connectés en tant que admin";
                echo'<a href="../pages/admin.php">Cliquer sur ce lien pour acceder à votre page</a>';
            }
           
        }
    }
}
?>