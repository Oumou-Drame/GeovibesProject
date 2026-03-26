<?php
session_start();
include('../config/database.php');

if(isset($_POST['preferences']) && !empty($_POST['preferences'])) {
    $_SESSION['choix'] = $_POST['preferences'];
    $tab = $_SESSION['choix'];
    $prefs = implode(',', array_fill(0, count($tab), '?'));
}

$tab = $_SESSION['choix'] ?? [];

    if(!empty($tab)){
        $demande = $pdo->prepare("SELECT articles.* FROM articles 
            LEFT JOIN categories ON articles.id = categories.id
            WHERE categories.nomcatg IN ($prefs)");
        $demande->execute($tab);
    }else {
        $demande = $pdo->query("SELECT * FROM articles");
    }

$articles = $demande->fetchAll();

/* Icônes et couleurs par catégorie */
$catStyles = [
    'Sport'       => ['icon' => '<i class="fa-solid fa-futbol"></i>', 'bg' => '#fff5f5'],
    'Technologie' => ['icon' => '<i class="fa-solid fa-display"></i>', 'bg' => '#f5f5ff'],
    'Politique'   => ['icon' => '<i class="fa-solid fa-scale-unbalanced"></i>', 'bg' => '#f5fff8'],
    'Education'   => ['icon' => '<i class="fa-solid fa-building-columns"></i>', 'bg' => '#fffbf0'],
    'Culture'     => ['icon' => '<i class="fa-solid fa-landmark"></i>', 'bg' => '#fff0fa'],
    'Santé'       => ['icon' => "<i class='fa-solid fa-stethoscope'></i>", 'bg' => '#f0faff'],
];
$defaultStyle = ['icon' => '<i class="fa-regular fa-newspaper"></i>', 'bg' => '#dcdbdb57'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoVibles - Actualité</title>
    <link rel="stylesheet" href="../test.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        body {
            background-color: #f8f9fa; /* Un gris très léger et propre */
            margin: 0;
            padding: 0;
        }
    </style>

    <?php
                if ($_SESSION['role'] === "editeur"){
                    include("../includes/enteteEditeur.php"); include("../includes/menu.php");

                }
                if ($_SESSION['role'] === "administrateur"){
                    include("../includes/enteteAdmin.php"); include("../includes/menu.php");

                }
    ?>
    
    <!-- Header section -->
    <section class="hero">
        <div class="hero-inner">
            <div>
                <p class="label">Votre fil d'actualité</p>
                <h1 class="hero-text">
                L'actu qui vous </br>
                <span class="name">ressemble.</span>
                </h1>
                <p class="p">Retrouvez chaque jour une sélection personnalisées selon vos centres d'interets</p>
            </div>
            <div class="hero-right">
                <p class="date">
                    <?php echo strftime('%A %d %B %Y') ?: date('d/m/Y'); ?>
                </p>
                <a href="../preferences.php" class="preferences-link">
                    <i class="fa-solid fa-sliders" style="font-size:11px;"></i>
                    Modifier mes préférences
                </a>
            </div>
        </div>  
    </section>

    <!-- articles -->
    <div class="articles-section">
        <div class="articles-head">
            <p class="articles-head-title">Articles sélectionnés pour vous</p>
            <div class="articles-head-line"></div>
            <span class="articles-head-count"><?php echo count($articles) ?> article<?php echo count($articles) > 1 ? 's' : '' ?></span>
        </div>

        <?php if(empty($articles)): ?>
        <div class="articles-empty">
            <i class="fa-regular fa-newspaper"></i>
            <p>Aucun article trouvé pour vos préférences actuelles.</p>
            <a href="../preferences.php">Choisir mes préférences</a>
        </div>

        <?php else:?>
        <div class="articles-grille">
            <!-- Recuperation des styles -->
            <?php foreach($articles as $a):
                $cat = ($a['categorie'] ?? '');
                $style = $catStyles[$cat] ?? $defaultStyle;
            ?>
            <a class="article-cart" href="detail.php?id=<?= $a['id'] ?>">
                <div class="article-background" style="background: <?= $style['bg'] ?>;">
                    <?= $style['icon'] ?>
                </div>
                    <div class="article-body">
                        <p class="nomcategorie"><?php echo htmlspecialchars($a['categorie']);?></p>
                        <p class="titre-article"><?php echo htmlspecialchars($a['titre']);?></p>
                        <p class="description-article"><?php echo htmlspecialchars($a['description']);?></p>
                    </div>
            </a>
            <?php endforeach;?>
        </div>
        <?php endif;?>
    </div>

    <?php include("../includes/footer.php");?>
</body>
</html>
