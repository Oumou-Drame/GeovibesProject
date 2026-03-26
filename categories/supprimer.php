<?php
    session_start();
    include "../config/database.php";

    $categorie_id = $_GET['categorie_id'];

    $sql = "DELETE FROM categories WHERE id = $categorie_id";

    $result = $pdo->query($sql);
     if(!$result){
        $message = "error! {$pdo->error}";
    }else{
        $message = "Suppression effectuée avec succès !";

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="../articles/ajouter_articles.css">
    <title>Supprimer - Catégorie</title>
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap');
        main{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(195, 195, 195, 0.2);
            margin-top:10px;
            font-family: "serif", sans-serif;
        }

        h2{
            font-family: "serif", sans-serif;
            color: rgb(196, 3, 3);
            font-weight: 700;
        }

        .lien a{
            text-decoration: none;
            color: #1a1a1a;
            font-size: 18px;

        }

        .lien{
        align-items: center;
        margin-top: 10px;
        width: 180px;
        border: 1px solid rgba(0, 0, 0, 0.122);
        padding: 10px;
        border-radius: 10px;
        }

        .lien a:hover{
            color: rgb(220, 3, 3);
        }

    </style>

    <div class="lien">
        <a href="../categories/afficher.php"><i class="fa-solid fa-arrow-left-long"></i> Retour au menu</a>
    </div>

    <main>
        <?php if(isset($message) && !empty($message)):?>
            <div class="alert <?php echo $message_type;?>">
                <?php echo "<h2>$message</h2>";?>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        <?php endif;?>
    </main>
</body>
</html>