<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="connexion.js" defer></script>
<body>
    <div id="role">
        <button id="editeur"><span><i class="fa-solid fa-pen"></i> </span>Editeur</button>
        <button id="admin"><span><i class="fa-solid fa-user-tie"></i> </span>Administrateur</button>
    </div>

     <!--Page de connexion-->
    <form action="traitement_connexion.php" method="post">
        <h2><span id="titre-style">Accès sécurisé,</span></h2>
        <p>Connectez-vous en tant qu' <span id="roleText">Administrateur</span> pour accéder à votre espace de rédaction.</p>
        <label for="Enail">ADRESSE E-MAIL</label>
        <input type="text" placeholder="Email" name="email" value="" class="input-actif" required>
        <label for="Enail">MOT DE PASSE</label>
        <input type="password" placeholder="Mot de passe" name="password" class="input-actif" required>
        <input type="submit" value="Se connecter" id="actif-bouton" class="bouton">
    </form>
</body>
</html>
