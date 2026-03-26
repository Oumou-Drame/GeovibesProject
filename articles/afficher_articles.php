<?php
session_start();
include('../config/database.php');

//preparation des requetes et execution
$requete = "SELECT * FROM articles";
$result = $pdo->prepare($requete);
$result->execute();

$listarticles = $pdo->query("SELECT id, titre, Description FROM articles");
$articles = $listarticles->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Articles</title>
    <link rel="stylesheet" href="afficher_articles.css">
    
</head>
<body>

<div>
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
            <h2>Gestion des articles</h2>
            <span>Gérez et publiez le contenu éditorial</span>
        </div>
        <div class="header-right">
            <a href="../articles/ajouter_articles.php"><i class="fa-solid fa-plus"></i> Nouveau Article</a>
        </div>
    </div>

    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)):?>
    <?php
        $id = htmlspecialchars($row['id']);
        $titre = htmlspecialchars($row['titre']);
        $categorie = htmlspecialchars($row['categorie']);
    ?>

    <!--le grand conteneur -->
    <div class="contenu">
        <div class="un-contenu">
             <!-- le conteneur pris individuellement -->
            <div class="contenu-left">
                <div class="article-icon">✦</div>
                <!-- la section titre et categorie -->
                <div class="contenu-first">

                    <?php echo "<a href='../articles/detail.php?id={$id}'>
                        <h3>$titre</h3>
                    </a>";?>

                    <p class="categorie"><?php echo $categorie;?></p>
                </div>
            </div>

            <!-- la section action-->
            <div class="actions">
                <?php echo"<a href='../categories/modifier.php?id={$id}';>✎</a>"?>
                <?php echo"<a href='../categories/supprimer.php?id={$id}';>✕</a>"?>
            </div>       
        </div>
        </div>
    </div>
    
    <?php endwhile; ?>
</body>
</html>
