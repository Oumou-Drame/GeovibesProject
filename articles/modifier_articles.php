<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    include("../config/database.php");

    $post_id= $_GET['post_id'];

    if(!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ["administrateur", "editeur"])){
        header("Location: ../auth/connexion.php");
        exit();

    }else {
        if($_SESSION['role'] === "administrateur" || $_SESSION['role'] === "editeur"){
            $sql = "SELECT * from categories";
            $result = $pdo->query($sql);

            if(!$result){
                echo"Error {$pdo->error}";
            }else {
                    
               if(isset($_POST['submit'])){

                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $categoryname = htmlspecialchars($_POST['categoryname']);
                $auteur = htmlspecialchars($_POST['auteur']);

                //$name = $_FILES['image']['name'];
                //$name = str_replace(" ", "_", $name);
                // enlever caractères spéciaux
                //$name = preg_replace("/[^A-Za-z0-9\._-]/", "", $name);
                //$temp_location = $_FILES['image']['tmp_name'];
                //$our_location = "../images/";
                //if(!empty($name)){
                    //move_uploaded_file($temp_location,$our_location.$name);
                //}


                $sql1 ="SELECT id from categories where nomcatg ='$categoryname' ";
                $result1 = $pdo->query($sql1);
                $row = $result1->fetch(PDO::FETCH_ASSOC);
                if($row){
                    $idforcategory = $row['id'];
                }
                $sql2 = "update articles set
                                        titre ='$title',
                                        contenu='$content',
                                        categorie='$categoryname',
                                        auteur='$auteur',
                                        date_publication = NOW()
                                        WHERE id='$post_id'";
                $result2 = $pdo->query($sql2);
        
                if($result2){
                    echo"Successfully updated";
                }else{
                    echo"Error! $pdo->error";
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
    <title>Document</title>
    <link rel="stylesheet" href="ajouter_articles.css">
</head>
<body>
     <!-- entete.php -->
    <div class="header">
        <header>
            <div class="maquette">
                <p id="logo1">Geo<span class="vibes">Vibes</span></p>
            </div>
            <a href="../articles/afficher_articles.php" class="lien">Retour au menu</a>

            <?php if ($_SESSION['role'] === "editeur"):?>
            <p id="texte2">Hello, <span id="styletexte2"><?php echo "Editeur";?></span></p>
            <?php else:?>
            <p id="texte2">Hello, <span id="styletexte2"><?php echo "Administrateur";?></span></p>
            <?php endif;?>
        </header> 
    </div>

    <div class="page">
        <div class="page-header">
            <h1>Modifier un article</h1>
        </div>
        
        <div class="container">
            <form action="../articles/modifier_articles.php?post_id=<?php echo $post_id; ?>" method="POST" enctype="multipart/form-data">
                <div class="contenu-section">
                    <label for="titre">Titre</label>
                    <input type="text" name="title" placeholder ="Titre de contenu" required> <br>
                </div>
                <div class="contenu-section">
                    <label for="contenu">Contenu</label>
                    <textarea name="content" placeholder="Contenu de l'article" required></textarea><br>
                </div>

                <div class="contenu-section">
                    <label for="auteur">Auteur</label>
                    <input type="text" name="auteur" placeholder="nom de l'auteur" required><br>
                </div>

                <div class="contenu-section">
                    <label for="categorie">Catégorie du contenu</label>
                    <select name="categoryname">
                        <?php  while($row = $result->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo"{$row['nomcatg']}";?>"><?php echo"{$row['nomcatg']}";?></option>
                        <?php }?>
                    </select> <br>
                </div>
                <input type="submit" name = "submit" value="Mettre à jour l'article" class="bouton">
            </form>
        </div>
    </div>
</body>
</html>