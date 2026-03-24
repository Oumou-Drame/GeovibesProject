<?php
session_start();
include ('../config/database.php');

$id = intval ($_GET['id'] ?? 0);
if ($id === 0){
  header('Location: ../utilisateurs/liste.php');
  exit;
}

if ($id === intval ($_SESSION['id'])) {
  header('Location: liste.php?erreur=auto-suppression');
  exit;

}

$demande = $pdo->prepare("SELECT id FROM utilisateurs WHERE id = ?");
$demande->execute([$id]);
if (!$demande->fetch()) {
  header('Location: ../utilisateurs/liste.php');
  exit;
}

$demande = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
$demande->execute([$id]);

header('Location: ../utilisateurs/liste.php');
exit;
?>
