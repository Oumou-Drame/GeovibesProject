<?php
    session_start();
    $user_id =$_SESSION['user_id'];
    include "../config/database.php";

    if(!isset($_SESSION['user_id'])){
        header("Location: ../auth/connexion.php");

    }else {
        if($_SESSION['role'] === "administrateur" || $_SESSION['role'] === "administrateur"){

            $sql = "SELECT * from categories";
            //$result = mysqli_query($connexion,$sql);
            $result = $pdo->query($sql);

            if(!$result){
                echo"Error {$pdo->error}";
            }else {
                    //while($row = mysqli_fetch_assoc($result)){
                    //echo"{$row['id']}";
                    //echo"<br>";
                    //echo"{$row['name']}";
               // }
               if(isset($_POST['submit'])){

                $title = $_POST['title'];
                $content = $_POST['content'];
                $categoryname = $_POST['categoryname'];

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
                //$result1 = mysqli_query($pdo,$sql1);
                $result1 = $pdo->query($sql1);
                //$row = mysqli_fetch_assoc($result1);
                $row = $result1->fetch(PDO::FETCH_ASSOC);
                if($row){
                    $idforcategory = $row['id'];
                }
                $sql2 ="INSERT INTO articles(titre,contenu,id,categorie,auteur) VALUES
                ('$title','$content','$user_id','$idforcategory','$name') ";
                //$result2 = mysqli_query($pdo,$sql2);
                $result2 = $pdo->query($sql2);
                if($result2){
                    echo"Successfully done";
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
    <form action="../articles/ajouter.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder ="Titre de contenu" required> <br>
        <textarea name="content" placeholder="Contenu de l'article" required></textarea><br>
        <select name="categoryname">
            <?php  while($row = $result->fetch(PDO::FETCH_ASSOC)){?>
            <option value="<?php echo"{$row['name']}";?>"><?php echo"{$row['name']}";?></option>
            <?php }?>
        </select> <br>
        <input type="file" required name="image"> <br>
        <input type="submit" name = "submit" value="Add Post">
    </form>
</body>
</html>