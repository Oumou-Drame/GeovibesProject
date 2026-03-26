<?php
    session_start();
    include "../config/database.php";

     $categorie_id= $_GET['categorie_id'];

     if(!isset($_SESSION['user_id'])){
        header("Location: ../auth/connexion.php");
    }else {
        if($_SESSION['role'] === "administrateur" || $_SESSION['role'] === "editeur"){

            $sql = "SELECT * from categories";

            $result = $pdo->query($sql);

            if(!$result){
                echo"Error {$pdo->error}";
            }else{
                    
               if(isset($_POST['submit'])){
                $categoryname = $_POST['name'];
                $sql2 = "UPDATE categories SET
                                        nomcatg ='$categoryname'
                                        WHERE id='$categorie_id'";

                $result2 = $pdo->query($sql2);
                if($result2){
                    $message = "Modification effectuée avec succès";
                    $message_type = "success";
                }else{
                    $message = "Error! $pdo->error";
                    $message_type = "error";
                }
               }
            }
        }else {
            header("Location: ../auth/connexion.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier - Catégorie</title>
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
        <h1>Modifier catégorie</h1>
      </div>

        <form action="../categories/modifier.php?categorie_id=<?php echo $categorie_id; ?>" method="POST">
            <div class="container">
                <div class="contenu-section">
                    <label for="nom">Nom de la categorie</label>
                    <input type="text" name="name" required>
                </div>
                <input type="submit" name="submit" value="Mettre à jour" class="bouton">
            </div>
        </form>
    </div>
</body>
</html>