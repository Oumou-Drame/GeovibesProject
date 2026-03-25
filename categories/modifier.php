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
    <form action="../categories/modifier.php?categorie_id=<?php echo $categorie_id; ?>" method="POST">
        <input type="text" name="name" required>
        <input type="submit" name="submit" value="updateCategory">
    </form>
</body>
</html>