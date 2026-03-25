<?php
    session_start();
    include "../config/database.php";
     $categorie_id= $_GET['categorie_id'];
     if(!isset($_SESSION['user_id'])){
        header("Location: ../auth/connexion.php");
    }else {
        if($_SESSION['user_role'] === "author"){
            $sql = "SELECT * from categories";
            $result = $connexion->query($sql);
            if(!$result){
                echo"Error {$connexion->error}";
            }else {
                    
               if(isset($_POST['submit'])){
                $categoryname = $_POST['name'];
                $sql2 = "UPDATE categories SET
                                        name ='$categoryname'
                                        WHERE id='$categorie_id'";
                $result2 = $connexion->query($sql2);
                if($result2){
                    echo"Successfully updated";
                }else{
                    echo"Error! $connexion->error";
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
