<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoVibles - Actualité</title>
    <link rel="stylesheet" href="styleaccueil.css">
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
    include("../includes/entete.php"); include("../includes/menu.php");
    ?>

    <main style="min-height: 50vh; padding: 50px; text-align: center; margin-top: 20px;">
        <h1>Bienvenue sur votre fil d'actualité</h1>
        <div class="infoline">
            <div class="infolineText">
                <span id="infolineTitre">Garder une longueur d'avance</span>
                <span id="infolineTitre2">Recevez chaque jour une selection d'Actualités personnalisées</span>
            </div>
            <div class="input">
                <input type="text" placeholder="your@email.con" class="inputmail">
                <input type="submit" value="S'inscrire gratuitement" class="inputSubmit">
            </div>
        </div>
    </main>

<?php
    include("../includes/footer.php");
?>
</body>
</html>