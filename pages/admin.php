<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ../auth/connexion.php");
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
    <style>
        body {
            background-color: #f8f9fa; /* Un gris très léger et propre */
            font-family: 'Inter', system-ui, sans-serif;
            margin: 0;
            padding: 0;
        }

    </style>

    <?php
        include("../includes/enteteAdmin.php"); include("../includes/menuAdmin.php");
    ?>
    <main>
        <h2>Bienvenue sur votre page Editeur <?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, iure, consequatur id vero, amet praesentium minus perspiciatis eum necessitatibus aliquid asperiores ducimus excepturi nostrum tenetur esse eveniet maxime molestias sint.</p>
    </main>

</body>
</html>