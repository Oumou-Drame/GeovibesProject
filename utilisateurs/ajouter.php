<?php
session_start();
include ('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$mdp = $_POST['motdepasse'];
$role = $_POST['role'];

if(empty($nom)) echo "Le nom doit être renseigné";
if(empty($prenom)) echo "Le prénom doit être renseigné";
if(empty($login)) echo "Le login doit être renseigné";
if(!in_array($role, ['editeur', 'administrateur'])) {
echo "Le nom doit être renseigné";
} 

$demande = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, login, motdepasse, role) VALUES (?, ?, ?, ?, ?)");
$demande->execute([$nom, $prenom, $login, $mdp, $role]);

echo "Utilisateur ajouté!";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Ajout Utilisateur - Geovibes</title>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
  
   <?php include ('../entete.php'); ?>
   <?php include ('../menu.php'); ?>



  <h1>Ajouter un utilisateur</h1>
  


  <form action="ajouter.php" method="POST" id=formulaire>
    <input type="text" name="nom" id="nom" placeholder="Nom">
    <input type="text" name="prenom" id="prenom" placeholder="Prénom">
    <input type="text" name="login" id="login" placeholder="Login">
    <input type="password" name="motdepasse" id="mdp" placeholder="mot de passe">
   
          <select name="role" id="role">
             <option value="editeur">Éditeur</option>
             <option value="administrateur">Administrateur</option>
                </select>
            
            <button type="submit" class="btn1">Ajouter</button>
  </form>

  <a href="liste.php">Retourner à la liste</a>
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

<?php include ('../footer.php'); ?>
</html>
