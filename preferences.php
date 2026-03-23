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
                    <input type="checkbox" name="preferences" value="sport" class="input-invisible">
                    <span><i class="fa-solid fa-baseball"></i></span>
                    <span>Sport</span>
                </label>


                <!--Europe-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="technologie" class="input-invisible">
                    <span><i class="fa-solid fa-robot"></i></span>
                    <span>Technologie</span>
                </label>

                <!--Amerique-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="politique" class="input-invisible">
                    <span><i class="fa-solid fa-landmark-dome"></i></span>
                    <span>Politique</span>
                </label>

                <!--Asie-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="education" class="input-invisible">
                    <span><i class="fa-solid fa-book-open"></i></span>
                    <span>Education</span>
                </label>

                <!--Oceanie-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="culture" class="input-invisible">
                    <span><i class="fa-solid fa-book-open"></i></span>
                    <span>Culture</span>
                </label>

                <!--Tout-->
                <label class="preference-choix">
                    <input type="checkbox" name="preferences" value="sante" class="input-invisible">
                    <span><i class="fa-solid fa-briefcase-medical"></i></span>
                    <span>Sante</span>
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