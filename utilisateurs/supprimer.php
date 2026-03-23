<?php
session_start();
include ('../db.php');

$id = intval ($_GET['id'] ?? 0);
if ($id === 0){
  header('Location: liste.php');
  exit;
}

if ($id === intval ($_SESSION['id'])) {
  header('Location: liste.php?erreur=auto-suppression');
  exit;

}

$demande = $pdo->prepare("SELECT id FROM utilisateurs WHERE id = ?");
$demande->execute([$id]);
if (!$demande->fetch()) {
  header('Location: liste.php');
  exit;
}

$demande = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
$demande->execute([$id]);

header('Location: liste.php');
exit;
?>
