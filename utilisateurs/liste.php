<?php
session_start();
include ('../db.php');


$listusers = $pdo->query("SELECT id, nom, prenom, login, role FROM utilisateurs");
$utilisateurs = $listusers->fetchAll();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>GeoVibes - Utilisateurs</title>
    <link rel="stylesheet" href="../style.css">
    
  </head>
  <body>
  
  <?php include ('../entete.php'); ?>
  <?php include ('../menu.php'); ?>

  <div style="max-width: 900px; margin: 30px auto; padding: 0 20px;">
  <h1>Gestion des utilisateurs</h1>
  <a href="ajouter.php">Ajouter un utilisateur</a>
  <table>
    <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Login</th>
    <th>Rôle</th>
    </tr>
    <?php foreach ($utilisateurs as $user): ?>
  <tr>
    <td><?= htmlspecialchars($user['nom'])?></td>
    <td><?= htmlspecialchars($user['prenom'])?></td>
    <td><?= htmlspecialchars($user['login'])?></td>
    <td><?= htmlspecialchars($user['role'])?></td>
    <td>
      <a href="modifier.php?id=<?= $user['id'] ?>">Modifier</a>
      <a href="supprimer.php?id=<?= $user['id'] ?>"onclick="return confirm(' Vous vous supprimer cet utilisateur ?')">Supprimer</a>
    </td>
  </tr>
   <?php endforeach; ?>
   </table>
    </div>
   <?php include ('../footer.php'); ?>
   </body>
</html>
