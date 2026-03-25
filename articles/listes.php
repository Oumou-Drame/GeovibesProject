<?php
include('../config/database.php');

$listarticles = $pdo->query("SELECT id, titre FROM articles");
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

<?php include('../includes/entete.php'); ?>
<?php include('../includes/menu.php'); ?>

<div>
    <h1>Liste Articles</h1>

   
    <div class="articles-grid">
        <?php foreach ($articles as $article): ?>
        <div class="article">
            <h2>
                
                <a href="detail.php?id=<?= $article['id'] ?>">
                    <?= htmlspecialchars($article['titre']) ?>
                </a>
            </h2>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>
