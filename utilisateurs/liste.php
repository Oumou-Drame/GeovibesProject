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
    <link rel="stylesheet" href="liste.css">
    
  </head>
  <body>
  <?php include ('../includes/enteteAdmin.php'); ?>
  <?php include ('../includes/menuAdmin.php'); ?>

  <div class="page-wrap">

  <div class="header-page">
    <div class="page-header">
        <h2>Gestion des utilisateurs</h2>
        <span>Gérez les utilisateurs de GeoVibes</span>

    </div>
    <div class="lien">
        <a href="../utilisateurs/ajouter.php">Ajouter un utilisateur</a>
    </div>
  </div>
    

    <div class="col-header">
        <span>Utilisateur</span>
        <span>Login</span>
        <span>Rôle</span>
        <span></span>
    </div>

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
              <a href="../utilisateurs/modifier.php">✎</a>
              <a href="../utilisateurs/supprimer.php">✕</a>
          </div> 

        </div>
    
    <?php endwhile; ?>
</html>
