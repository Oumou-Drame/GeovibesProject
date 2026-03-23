<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ../auth/connexion.php");
    }else {
        echo"Welcome to your dashborard ";
        echo$_SESSION['user_name'];
        echo'<br> <a href="../auth/deconnexion.php">Deconnexion</a>';
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
    <ul>
        <li><a href="../articles/afficher_articles.php">Afficher les articles</a></li>
        <li><a href="../articles/ajouter.php">Ajouter un article</a></li>
    </ul>
</body>
</html>