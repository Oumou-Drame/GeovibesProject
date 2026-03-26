<?php
    session_start();
    include "../config/database.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: ../auth/connexion.php");
    }
    $sql = "SELECT * FROM articles";
    $result = $pdo->query($sql);
    $nombreArticles = 0;
    while($row = $result->fetch(PDO::FETCH_ASSOC) ){
        $nombreArticles++;
    }   
    $sql1 = "SELECT * FROM categories";
    $result1 = $pdo->query($sql1);
    $nombreCategories = 0;

    while($row = $result1->fetch(PDO::FETCH_ASSOC) ){
        $nombreCategories++;
    }

    $listusers = $pdo->query("SELECT * FROM utilisateurs");

    $nombreEditeur = 0;
    $nombreAdministrateur = 0;
    while($row = $listusers->fetch(PDO::FETCH_ASSOC)){

        if($row['role'] === "editeur"){
            $nombreEditeur++;
        }else{
            $nombreAdministrateur++;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="editeur2.css">
</head>
<body>
    <style>
        body {
            background-color: #f8f9fa; /* Un gris très léger et propre */
            font-family: 'Inter', system-ui, sans-serif;
            margin: 0;
            padding: 0;
        }

    </style>

    <?php
        include("../includes/enteteAdmin.php"); include("../includes/menuAdmin.php");
    ?>
        <main>
        <section class="hero">
            <div class="label">Espace Administateur</div>
            <div class="hero-text">
                <h1>
                    Bonjour,</br>
                    <span class="name"><?php echo $_SESSION['prenom']." ".$_SESSION['nom'];?></span>
                </h1>
            </div>
            <p>Gérez vos contenus, suivez vos publications et explorez les performances de votre espace éditorial.</p>
        </section>

        <!-- DIVIDER -->
        <div class="divider">
            <div class="divider-line"></div>
            <span class="divider-tag">Vue d'ensemble</span>
            <div class="divider-line"></div>
        </div>

        <div class="stats">
            <div class="stat-section">
                <div class="stat-icon"><i class="fa-regular fa-pen-to-square"></i></div>
                <div class="stat-value"><?php echo $nombreArticles; ?></div>
                <div class="stat-label">Articles publiés</div>
            </div>
            <div class="stat-section">
                <div class="stat-icon"><i class="fa-solid fa-grip"></i></div>
                <div class="stat-value"><?php echo $nombreCategories; ?></div>
                <div class="stat-label">Categories</div>
            </div>
            <div class="stat-section">
                <div class="stat-icon"><i class="fa-regular fa-user"></i></div>
                <div class="stat-value"><?php echo $nombreAdministrateur; ?></div>
                <div class="stat-label">Nombre administrateur</div>
            </div>
        </div>

        <!-- DIVIDER -->
        <div class="divider">
            <div class="divider-line"></div>
            <span class="divider-tag">ACTIONS RAPIDES</span>
            <div class="divider-line"></div>
        </div>

        <div class="actions-grid">
                <a href="../articles/ajouter_articles.php" class="action-section">
                    <div class="action-icon"><i class="fa-solid fa-pen"></i></div>
                    <div class="div">
                        <div class="action-title">Nouvel article</div>
                        <div class="action-label">Commencer une nouvelle publication</div>
                    </div>
                </a>
                <a href="../articles/afficher_articles.php" class="action-section">
                    <div class="action-icon"><i class="fa-regular fa-bookmark"></i></div>
                    <div class="div">
                        <div class="action-title">Mes articles</div>
                        <div class="action-label">Consulter et éditer vos contenues</div>
                    </div>
                </a>
                <a href="../categories/ajouter.php" class="action-section">
                    <div class="action-icon"><i class="fa-solid fa-file-pen"></i></div>
                    <div class="div">
                        <div class="action-title">Nouvelle catégorie</div>
                        <div class="action-label">Créer une nouvelle catégorie</div>
                    </div>
                </a>
                <a href="../categories/afficher.php" class="action-section">
                    <div class="action-icon"><i class="fa-solid fa-ellipsis"></i></div>
                    <div class="div">
                        <div class="action-title">Mes catégories</div>
                        <div class="action-label">Consulter et éditer vos catégories</div>
                    </div>
                </a>
                
        </div>
       
    </main>

</body>
</html>

</body>
</html>