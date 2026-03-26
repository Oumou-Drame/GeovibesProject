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
    <title>Catégories</title>
    <link rel="stylesheet" href="../articles/afficher_articles.css">
    
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
        <div class="header-left">
            <a href="../pages/editeur.php">
            <i class="fa-solid fa-arrow-left-long"></i> Retour au menu</a>
        </div>
        <div class="hero">
            <h2>Gestion des catégories</h2>
            <span>Gérez et publiez les catégories</span>
        </div>
        <div class="header-right">
            <a href="../categories/ajouter.php"><i class="fa-solid fa-plus"></i> Nouvelle catégorie</a>
        </div>
    </div>

    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)):?>
    <?php
        $id_categorie = htmlspecialchars($row['id']);
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
                <?php echo"<a href='../categories/modifier.php?categorie_id={$id_categorie}';>✎</a>"?>
                <?php echo"<a href='../categories/supprimer.php?categorie_id={$id_categorie}';>✕</a>"?>
            </div>

        </div>
    </div>
    
    <?php endwhile; ?>
</body>
</html>
