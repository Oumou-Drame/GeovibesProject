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
    <title>Articles - GeoVibes</title>
    <link rel="stylesheet" href="../style.css">
    </head>
<body>


<div style="max-width: 900px; margin: 30px auto; padding: 0 20px;">

    <h1>Liste des articles</h1>

    <?php foreach ($result as $article): ?>
    <div class="article">

        <div class="article-entete">
            <h2><?= htmlspecialchars($article['titre']) ?></h2>
        </div>

        <p>
            <?= htmlspecialchars($article['contenu']) ?>
        </p>

        <div class="details" >
            <p><strong>Contenu :</strong> <?= htmlspecialchars($article['contenu']) ?></p>
            <p><strong>Auteur :</strong> <?= htmlspecialchars($article['auteur']) ?></p>
            <p><strong>Date :</strong> <?= $article['date_publication'] ?></p>
            <p><strong>Catégorie :</strong> <?= htmlspecialchars($article['categorie_nom']) ?></p>
        </div>


    </div>
    <?php endforeach; ?>

</div>

</body>
</html>