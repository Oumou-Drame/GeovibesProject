<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=geovibes;charset=utf8","root","");

    //Activer les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erreur : ".$e->getMessage());
}

?>