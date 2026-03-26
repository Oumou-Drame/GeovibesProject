<?php
session_start();
include ('../config/database.php');


$listusers = $pdo->query("SELECT * FROM utilisateurs");

function initiales(string $nom, string $prenom): string {
    $initialeNom = mb_substr($nom, 0, 1);
    $initialePrenom = mb_substr($prenom, 0, 1);
    return strtoupper($initialePrenom . $initialeNom);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>GeoVibes - Utilisateurs</title>
    <link rel="stylesheet" href="liste1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    
  </head>
  <body>
  <?php include ('../includes/enteteAdmin.php'); ?>
  <?php include ('../includes/menuAdmin.php'); ?>

  <div class="page-wrap">

    <div class="header-page">
            <div class="header-left">
                <a href="../pages/editeur.php">
                <i class="fa-solid fa-arrow-left-long"></i> Retour au menu</a>
            </div>
            <div class="hero">
                <h2>Gestion des utilisateurs</h2>
                <span>Gérez les utilisateur de GeoVibes</span>
            </div>
            <div class="header-right">
                <a href="../utilisateurs/ajouter.php"><i class="fa-solid fa-plus"></i> Nouvel utilisateur</a>
            </div>
        </div>

    <div class="col-header">
        <span>Utilisateur</span>
        <span>Login</span>
        <span>Rôle</span>
        <span></span>
    </div>

    <div class="user-list">
        <?php while ($row = $listusers->fetch(PDO::FETCH_ASSOC)):?>
        <?php
            $nom = htmlspecialchars($row['nom']);
            $prenom = htmlspecialchars($row['prenom']);
            $login = htmlspecialchars($row['login']);
            $role = htmlspecialchars($row['role']);
        
        ?>
        <!--le grand conteneur -->
        <div class="user-row">
                <div class="identite-user">
                    <div class="initial"><?php echo initiales($nom,$prenom);?></div>
                    <span class="user-name"><?php echo $prenom." ".$nom;?></span>
                </div>
                <span class="login"><?php echo $login;?></span>
                <span class="role"><?php echo $role;?></span>

            <!-- la section action-->
            <div class="actions">
                <a href="../utilisateurs/modifier.php?id=<?php echo $row['id']; ?>">✎</a>
                <a href="../utilisateurs/supprimer.php?id=<?php echo $row['id']; ?>" 
                onclick="return confirm('Es-tu sûre de vouloir supprimer cet utilisateur ?');" 
                title="Supprimer">✕</a>
            </div> 

        </div>
        
        <?php endwhile; ?>
    </div>
  </div>

</html>
