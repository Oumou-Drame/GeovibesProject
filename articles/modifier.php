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


                $sql1 ="SELECT id from categories where name ='$categoryname' ";
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
</head>
<body>
   <form action="../articles/modifier.php?post_id=<?php echo $post_id; ?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder ="Titre de l'article" required> <br>
        <texterea name="content" placeholder="Contenu de l'article" required></textarea><br>
        <input name="auteur" placeholder="Auteur de l'article" required></input><br>
        <select name="categoryname">
            <?php  while($row = $result->fetch(PDO::FETCH_ASSOC)){?>
            <option value="<?php echo"{$row['name']}";?>"><?php echo"{$row['name']}";?></option>
            <?php }?>
        </select> <br>
        <input type="submit" name = "submit" value="update post">
    </form>
</body>
</html>