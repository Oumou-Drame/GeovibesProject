<?php
session_start();
include "../config/database.php";

if(!isset($_SESSION['user_id'])){
   // echo"You are not an admin";
    header("Location: ../auth/connexion.php");

}else {
    if($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "editeur"){

        if(isset($_POST['submit'])){

            $name = $_POST['name'];
            $sql = "INSERT INTO categories(nomcatg) VALUES('$name')";
            $result = $pdo->query($sql);
            if(!$result){
                $message = "Error!: {$pdo->error}";
                $message_type = "error";
            }else {
                $message = "Catégorie ajoutée avec succès";
                $message_type = "success";
            }
        }
    }else{
        header("Location: ../auth/connexion.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout article</title>
    <link rel="stylesheet" href="../articles/ajouter_articles.css">
</head>
<body>

     <div class="header">
        <header>
            <div class="maquette">
                <p id="logo1">Geo<span class="vibes">Vibes</span></p>
            </div>
            <a href="../categories/afficher.php" class="lien">Retour au menu</a>

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
        <h1>Nouvelle catégorie</h1>
      </div>

        <form action="../categories/ajouter.php" method="POST">
            <div class="container">
                <div class="contenu-section">
                    <label for="nom">Nom de la categorie</label>
                    <input type="text" name="name" required>
                </div>
                <input type="submit" name="submit" value="Ajouter une catégorie" class="bouton">
            </div>
        </form>
    </div>
</body>
</html>