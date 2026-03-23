<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="preference.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <!--logo-->
        <p id="logo">GeoVibles</p>

        <!--2 titres-->
        <div class="titre">
            <h2 id="titre1">Votre fil,</h2>
            <h2 id="titre2">votre choix.</h2>
        </div>

        <!--petit trait-->
        <div id="divider"></div>

        <!--sous titre-->
        <p id="sous-titre">Personnalisez votre feed en fonction de vos préfèrences</p>

        <form action="pages/accueil.php" method="POST">
            <label for="Nom">VOTRE NOM</label>
            <input type="text" placeholder="Nom" name="name">

            <label for="">VOS PREFERENCES</label>
            <div class="preference-grille">
                <!--Afrique-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="afrique" class="input-invisible">
                    <span><i class="fa-solid fa-earth-africa"></i></span>
                    <span>Afrique</span>
                </label>


                <!--Europe-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="europe" class="input-invisible">
                    <span><i class="fa-solid fa-earth-europe"></i></span>
                    <span>Europe</span>
                </label>

                <!--Amerique-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="amerique" class="input-invisible">
                    <span><i class="fa-solid fa-earth-americas"></i></span>
                    <span>Amerique</span>
                </label>

                <!--Asie-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="asie" class="input-invisible">
                    <span><i class="fa-solid fa-earth-asia"></i></span>
                    <span>Asie</span>
                </label>

                <!--Oceanie-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="oceanie" class="input-invisible">
                    <span><i class="fa-solid fa-earth-asia"></i></span>
                    <span>Oceanie</span>
                </label>

                <!--Tout-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="tout" class="input-invisible">
                    <span><i class="fa-solid fa-globe"></i></span>
                    <span>Tout</span>
                </label>
            </div>
            <input type="submit" value="Accéder à mon feed " id="bouton">
        </form>

    </div>
<script>
    let choix = document.querySelectorAll(".preference-choix");

    choix.forEach(element => {
        element.addEventListener("click",()=>{
            element.classList.toggle("selected");
        })
    });
    
</script>
</body>
</html>