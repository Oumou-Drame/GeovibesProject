<?php
session_start();
include('../db.php');

$listarticles = $pdo->query("SELECT id, titre, Description FROM articles");
$articles = $listarticles->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste Articles - GeoVibes</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include('../entete.php'); ?>
<?php include('../menu.php'); ?>

<div>
    <h1>Liste Articles</h1>

   
    <div class="articles-grid">
        <?php foreach ($articles as $article): ?>
        <div class="article">
            <h2>
                
                <a href="details.php?id=<?= $article['id'] ?>">
                    <?= htmlspecialchars($article['titre']) ?>
                </a>
            </h2>
            <p><?= htmlspecialchars($article['Description']) ?></p>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<?php include('../footer.php'); ?>

</body>
</html>
