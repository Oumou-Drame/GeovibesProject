<?php
session_start();
include("../db.php");


$id = intval($_GET['id'] ?? 0);
if ($id == 0) {
    header("Location: liste.php");
    exit;
}

$demande = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$demande->execute([$id]);
$utilisateur = $demande->fetch();

if (!$utilisateur) {
    header("Location: liste.php");
    exit;
}

$succes = '';
$erreurs = [];


if (!empty($_POST)) {
    $nom    = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $login  = trim($_POST['login'] ?? '');
    $mdp    = trim($_POST['motdepasse'] ?? '');
    $role   = $_POST['role'] ?? '';

    if (empty($nom))    $erreurs[] = "Le nom est obligatoire.";
    if (empty($prenom)) $erreurs[] = "Le prénom est obligatoire.";
    if (empty($login))  $erreurs[] = "Le login est obligatoire.";

    if (empty($erreurs)) {
        if (!empty($mdp)) {
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE utilisateurs SET nom=?, prenom=?, login=?, mot_de_passe=?, role=? WHERE id=?");
            $stmt->execute([$nom, $prenom, $login, $mdp_hash, $role, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE utilisateurs SET nom=?, prenom=?, login=?, role=? WHERE id=?");
            $stmt->execute([$nom, $prenom, $login, $role, $id]);
        }
        $succes = "Utilisateur modifié avec succès !";

        // Recharger les infos à jour
        $demande = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $demande->execute([$id]);
        $utilisateur = $demande->fetch();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification Utilisateur - GeoVibes</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include('../entete.php'); ?>
<?php include('../menu.php'); ?>

<div style="max-width: 500px; margin: 30px auto; padding: 0 20px;">

    <h1 style="text-align:center;">Modifier un utilisateur</h1>

    <?php if (!empty($erreurs)): ?>
        <div class="msg-erreur">
            <ul>
                <?php foreach ($erreurs as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($succes): ?>
        <p class="msg-succes"><?= $succes ?></p>
    <?php endif; ?>

    
    <form action="modifier.php?id=<?= $id ?>" method="POST">
        <label>Nom :
            <input type="text" name="nom" 
                   value="<?= htmlspecialchars($utilisateur['nom']) ?>">
        </label>
        <label>Prénom :
            <input type="text" name="prenom" 
                   value="<?= htmlspecialchars($utilisateur['prenom']) ?>">
        </label>
        <label>Login :
            <input type="text" name="login" 
                   value="<?= htmlspecialchars($utilisateur['login']) ?>">
        </label>
        <label>Nouveau mot de passe :
            <input type="password" name="motdepasse" 
                   placeholder="Laisser vide pour ne pas changer">
        </label>
        <label>Rôle :
            <select name="role">
                <?php foreach (['visiteur', 'editeur', 'administrateur'] as $r): ?>
                    <option value="<?= $r ?>" 
                        <?= $utilisateur['role'] === $r ? 'selected' : '' ?>>
                        <?= ucfirst($r) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="submit">Mettre à jour</button>
    </form>

    <a href="liste.php">← Retour à la liste</a>

</div>

<?php include('../footer.php'); ?>

</body>
</html>
