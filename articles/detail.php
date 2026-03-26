<?php
session_start();
 include ("../config/database.php");
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $demande = $pdo->prepare("SELECT articles.*,
                        categories.nomcatg AS categorie_nom
                        FROM articles
                        LEFT JOIN categories ON articles.id = categories.id
                        WHERE articles.id = ?"
);
$demande->execute([$id]);
$result = $demande->fetchAll();

 }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="../articles/detail.css">
    </head>
<body>

    <div class="header">
        <header>
            <div class="maquette">
                <p id="logo1">Geo<span class="vibes">Vibes</span></p>
            </div>
            <a href="../articles/afficher_articles.php" class="lien">Retour au menu</a>

            <?php if ($_SESSION['role'] === "editeur"):?>
            <p id="texte2">Hello, <span id="styletexte2"><?php echo "Editeur";?></span></p>
            <?php else:?>
            <p id="texte2">Hello, <span id="styletexte2"><?php echo "Administrateur";?></span></p>
            <?php endif;?>
        </header> 
    </div>

    <?php foreach ($result as $article): ?>
    <div class="article">
        <!--Titre-->
        <div class="titre">
            <h1><?php echo htmlspecialchars($article['titre']); ?></h1>
        </div>

        <!--Date + auteur-->
        <div class="auteur-date">
            <span><i class='fa-regular fa-user'></i> <?php echo htmlspecialchars($article['auteur']); ?></span>
            <span><i class="fa-solid fa-clock-rotate-left"></i> <?php echo htmlspecialchars($article['date_publication']); ?></span>
        </div>

        <!--divider-->
        <hr class="divider">

        <p class="description-titre">Resume</p>
        <p class="description-contenu"><?php echo htmlspecialchars($article['description']); ?></p>
        <p class="contenu-titre">Contenu</p>
        <p class="contenu"><?php echo htmlspecialchars($article['contenu']); ?></p>

    </div>
    <?php endforeach; ?>

</body>
</html>