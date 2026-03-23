<?php
session_start();
include ('../config/database.php');

$requete = "SELECT role FROM utilisateurs";
$sql = $pdo->prepare($requete);
$role = $sql->fetch();


if (isset($_REQUEST['name']) && !empty(trim($_REQUEST['name']))) {
    $_SESSION['name'] = htmlspecialchars($_REQUEST['name']);
}else if($role == "editeur"){

    $_SESSION['name'] = "Editeur";

}else if($role == "administrateur"){

    $_SESSION['name'] = "Administrateur";
}
else {
    $_SESSION['name'] = "Visiteur";
}

?>

<!-- style de l'entete -->
<style>

    .header{
        background: #ffffff
    }
    
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    header{
        background: rgba(255, 254, 254, 0.8);  
        display: flex;
        justify-content: space-between;
        padding: 18px 60px;
        font-family: 'Inter', system-ui, sans-serif;
        border-bottom: 1px solid rgba(123, 122, 122, 0.15);
    }

    #divider{
        height: 1px; 
        background: rgba(0, 0, 0, 0.121);

    }

    #logo1{
        font-size: 32px;
        font-family: 'Playfair Display', serif;
        font-weight: 800; /*effet gras*/
        letter-spacing: 0.5px; /*resserré les écritures*/

    }

    #logo1:hover{
        transform: scale(1.02);
    }
    vibes{
        color: rgb(220, 3, 3);
    }

    #texte{
        text-transform: uppercase;
        font-weight: 500;
        font-size: 10px;
        letter-spacing: 1px;
        color: rgba(4, 4, 4, 0.653);
    }
    .maquette{
        display: flex;
        flex-direction: column;
    }

    #texte2{
        font-size: 18px;
        margin-top: 20px;
        color: rgb(220, 3, 3);
        font-weight: 400;

        
    }
    #styletexte2{
        color: black;
        font-family: 'Playfair Display', serif;
        font-weight: 600; /*effet gras*/
        letter-spacing: 1px;
    }
    

</style>

<!-- entete.php -->
 <div class="header">
    <header>
        <div class="maquette">
            <p id="logo1">Geo<span class="vibes">Vibes</span></p>
            <p id="texte">L'ACTUALITE MONDIALE</p>
        </div>
        <p id="texte2">Hello, <span id="styletexte2"><?php echo $_SESSION['name'];?></span></p>
   </header> 
 </div>
 