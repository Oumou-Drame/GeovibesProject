<?php
session_start();
include('../db.php');

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
    <link rel="stylesheet" href="afficher_articles3.css">
    
</head>
<body>

<div>
    <h1>Liste Articles</h1>

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
        <?php 
        $post_id = $row['id'];
            echo"<div class='actions'>";
            echo"<a href='../articles/modifier_articles.php?post_id={$post_id}'>✎</a> <br>";
            echo"<a href='../articles/supprimer_articles.php?post_id={$post_id}'>✕</a> <br>";
            echo"</div>";
        ?>
        
        </div>
    </div>
    
    <?php endwhile; ?>
</body>
</html>
