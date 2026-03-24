<?php
session_start();
include("../config/database.php");

//preparation des requetes et execution
$requete = "SELECT * FROM categories";
$result = $pdo->prepare($requete);
$result->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Articles</title>
    <link rel="stylesheet" href="afficher_articles.css">
    
</head>
<body>
    <?php

    if ($_SESSION['role'] === "editeur") {

        include("../includes/enteteEditeur.php");
        include("../includes/menuEditeur.php");

    }else{

        include("../includes/enteteAdmin.php");
        include("../includes/menuAdmin.php");
    }  
    ?>

    <div class="header-page">
        <h2>Gestion des catégories</h2>
        <span>Gérez les différentes catégories</span>
    </div>

    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)):?>
    <?php
        $nom = htmlspecialchars($row['nomcatg']);
    ?>
    <!--le grand conteneur -->
    <div class="contenu">

        <div class="un-contenu">

            <!-- le conteneur pris individuellement -->
            <div class="contenu-left">
                <div class="article-icon">✦</div>
                <!-- la section titre et categorie -->
                <div class="contenu-first">
                    <h3><?php echo $nom;?></h3>
                </div>
            </div>

            <!-- la section action-->
            <div class="actions">
                <a href="../articles/modifier.php">✎</a>
                <a href="../articles/supprimer.php">✕</a>
            </div>

        </div>
    </div>
    
    <?php endwhile; ?>
</body>
</html>
