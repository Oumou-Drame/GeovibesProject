<?php
session_start();
include("../config/database.php");


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

$erreurs = [];


if (!empty($_POST)) {
    $nom    = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $login  = trim($_POST['login'] ?? '');
    $mdp    = trim($_POST['motdepasse'] ?? '');
    $role   = $_POST['role'] ?? '';

    if (empty($nom)){
        $erreurs[] = "Le nom est obligatoire.";
        $message_type = "error";
    }
    if (empty($prenom)){
        $erreurs[] = "Le prénom est obligatoire.";
        $message_type = "error";
    }
    if (empty($login)){
        $erreurs[] = "Le login est obligatoire.";
        $message_type = "error";
    }

    if (empty($erreurs)) {
        if (!empty($mdp)) {
            $stmt = $pdo->prepare("UPDATE utilisateurs SET nom=?, prenom=?, login=?, motdepasse=?, role=? WHERE id=?");
            $stmt->execute([$nom, $prenom, $login, $mdp, $role, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE utilisateurs SET nom=?, prenom=?, login=?, role=? WHERE id=?");
            $stmt->execute([$nom, $prenom, $login, $role, $id]);
        }
        $message = "Utilisateur modifié avec succès !";
        $message_type = "success";

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
    <title>Modification Utilisateur</title>
    <link rel="stylesheet" href="../articles/ajouter_articles.css">
</head>
<body>
    <!-- entete.php -->
    <div class="header">
        <header>
            <div class="maquette">
                <p id="logo1">Geo<span class="vibes">Vibes</span></p>
            </div>
            <a href="../utilisateurs/liste.php" class="lien">Retour au menu</a>

            <?php if ($_SESSION['role'] === "editeur"):?>
            <p id="texte2">Hello, <span id="styletexte2"><?php echo "Editeur";?></span></p>
            <?php else:?>
            <p id="texte2">Hello, <span id="styletexte2"><?php echo "Administrateur";?></span></p>
            <?php endif;?>
        </header> 
    </div>

    <?php if (!empty($erreurs)): ?>
        <?php foreach ($erreurs as $e): ?>
            <div class="alert <?php echo $message_type;?>">
                <?php echo $e;?>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <?php if(!empty($message)):?>
    <div class="alert <?php echo $message_type;?>">
        <?php echo $message;?>
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
      </div>
    <?php endif;?>
    <div class="page">
      <div class="page-header">
        <h1>Modifier un utilisateur</h1>
      </div>
        <div class="container">
            <form action="modifier.php?id=<?= $id ?>" method="POST">
                <div class="contenu-section">
                    <label for="nom">Nom </label>
                    <input type="text" name="nom" value="<?php echo htmlspecialchars($utilisateur['nom']) ?>">
                </div>
            
                <div class="contenu-section">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" value="<?php echo htmlspecialchars($utilisateur['prenom']) ?>">
                </div>

                <div class="contenu-section">
                    <label for="login">Login</label>
                    <input type="text" name="login" value="<?php echo htmlspecialchars($utilisateur['login']) ?>">
                </div>

                <div class="contenu-section">
                    <label for="mdp">Nouveau mot de passe</label>
                    <input type="password" name="motdepasse" placeholder="Laisser vide pour ne pas changer">
                </div>

                <div class="contenu-section">
                    <label>Rôle</label>
                    <select name="role">
                        <?php foreach (['editeur', 'administrateur'] as $r): ?>
                            <option value="<?= $r ?>" 
                                <?= $utilisateur['role'] === $r ? 'selected' : '' ?>>
                                <?= ucfirst($r) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <input type="submit" value="Mettre à jour" class="bouton">
        </form>
        </div>
</div>
</body>
</html>
