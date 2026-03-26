<?php
 session_start();
include ('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $login = htmlspecialchars($_POST['login']);
  $mdp = $_POST['motdepasse'];
  $role = $_POST['role'];

  if(empty(trim($nom))){
    $message = "Le nom doit être renseigné";
    $message_type = "error";

  }elseif (empty(trim($prenom))) {
    $message = "Le prénom doit être renseigné";
    $message_type = "error";

  }elseif (empty(trim($login))) {
    $message = "Le login doit être renseigné";
    $message_type = "error";

  }elseif (!in_array($role, ['editeur', 'administrateur'])) {
    $message = "Le role doit être editeur ou administrateur";
    $message_type = "error";

  }else {
    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    $demande = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, login, motdepasse, role) VALUES (?, ?, ?, ?, ?)");

    if ($demande->execute([$nom, $prenom, $login, $mdp_hash, $role])) {
        $message = "Utilisateur ajouté avec succès !";
        $message_type = "success";
    } else {
        $message = "Une erreur est survenue lors de l'ajout.";
        $message_type = "error";
    }
}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Ajout Utilisateur - Geovibes</title>
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

    <?php if(isset($message) && !empty($message)):?>
      <div class="alert <?php echo $message_type;?>">
        <?php echo $message;?>
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
      </div>
    <?php endif;?>

  <div class="page">
      <div class="page-header">
        <h1>Nouvel utilisateur</h1>
      </div>

    <div class="container">
      <form action="ajouter.php" method="POST" id=formulaire>
        <div class="contenu-section">
          <label for="nom">Nom</label>
          <input type="text" name="nom" placeholder ="Nom" required> <br>
        </div>

        <div class="contenu-section">
          <label for="prenom">Prenom</label>
          <input type="text" name="prenom" placeholder ="Prénom" required> <br>
        </div>

        <div class="contenu-section">
          <label for="login">Login</label>
          <input type="text" name="login" placeholder ="Login" required> <br>
        </div>

        <div class="contenu-section">
          <label for="mdp">Mot de passe</label>
          <input type="password" name="motdepasse" id="mdp" placeholder="mot de passe">
        </div>
              
        <div class="contenu-section">
          <label for="role">Role</label>
          <select name="role" id="role">
            <option value="editeur">Éditeur</option>
            <option value="administrateur">Administrateur</option>
        </select> 
        </div>
        
        <input type="submit" class="bouton">
      </form>
    </div>
  </div>
  </body>

<script>
  const formulaireajout = document.getElementById('formulaire');
  formulaireajout.onsubmit = function(event) {
    let nom = document.getElementById('nom').value();
    let prenom = document.getElementById('prenom').value();
    let login = document.getElementById('login').value();
    let mdp = document.getElementById('mdp').value();
    
    if (nom == "") {
      let message ="Le nom doit être renseingé";
    }
    if (prenom == "") {
      let message ="Le prénom doit être renseingé";
    }
    if (login == "") {
      let message ="Le login doit être renseingé";
    }
    if (mdp == "") {
      let message ="Le mot de passe doit être renseingé";
    }
    

  }
</script>
</html>
