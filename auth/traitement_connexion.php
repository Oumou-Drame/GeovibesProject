<?php
session_start();
include "../config/database.php";


if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['login'])){

    $login = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];
    
    //Preparation de la requete et execution
    $requete = "SELECT * FROM utilisateurs WHERE login = :login";
    $result = $pdo->prepare($requete);
    $result->execute(['login' => $login]);
    $user = $result->fetch();

    //on verifie si l'utilisateur existe
   if ($user) {

        //on compare le mot de passe actuel avec celui qui est dans la base de donnee
        if ($user['motdepasse'] == $password) {

            //on recupere les donnees dans des variables de sessions
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['login'] = $user['login'];

            if ($_SESSION['role'] == "administrateur") {
                header("Location: ../pages/admin.php");
                exit();

            }else{
                header("Location: ../pages/editeur.php");
                exit();

            }
            
        }else{
            $_SESSION['message_erreur'] = "Mot de passe ou login incorrect";
        }
   }else{
        $_SESSION['message_erreur'] = "Identifiant inconnu";
   }
}
?>