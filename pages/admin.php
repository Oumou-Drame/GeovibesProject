<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoVibles - Actualité</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        body {
            background-color: #f8f9fa; /* Un gris très léger et propre */
            margin: 0;
            padding: 0;
        }
    </style>

    <?php
     include("../includes/menu.php");
    ?>

    <main style="min-height: 50vh; padding: 50px; text-align: center; margin-top: 20px;">
        <h1 style="text-align:center; aligns-items:center;">Bienvenue sur votre page Administrateur</h1>
        <div class="infoline">
            <div class="infolineText">
                <span id="infolineTitre">Que souhaitez-vous faire ?</span>
            </div>
            <div>
               <a href="../utilisateurs/liste.php"><button class="btn1">Gérer les utilisateurs</button></a>
               <a href=""><button class="btn1">Gérer le contenu</button></a>
               <button></button>
            </div>
        </div>
    </main>

<?php
    include("../includes/footer.php");
?>
</body>
</html>
