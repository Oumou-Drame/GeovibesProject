<?php
session_start();
 include ("../db.php");
$demande = $pdo->query("SELECT articles.*,
                         utilisateurs.nom,
                         utilisateurs.prenom,
                         categories.nomcatg AS categorie_nom
                         FROM articles
                         LEFT JOIN utilisateurs ON articles.id = utilisateurs.id
                        LEFT JOIN categories ON articles.id = categories.id
                        ORDER BY articles.date_publication DESC"

);

$result = $demande->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Articles - GeoVibes</title>
    <link rel="stylesheet" href="../style.css">
    </head>
<body>

<?php include('../entete.php'); ?>
<?php include('../menu.php'); ?>

<div style="max-width: 900px; margin: 30px auto; padding: 0 20px;">

    <h1>Liste des articles</h1>

    <?php foreach ($result as $article): ?>
    <div class="article">

        <div class="article-entete">
            <h2><?= htmlspecialchars($article['titre']) ?></h2>
            <button class="btn1" onclick="Article(this)">+</button>
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


<?php include('../footer.php'); ?>

</body>
</html>
