<?php

require("../model/DAO.php");
require("../model/DTO.php");

$error="";

//variables  à envoyer pour la création d'un objet BDD
$host ='localhost';
$dbname = 'p1702775';
$username = 'p1702775';
$psw = '296054';

// création et initialisation de la BDD
$bdd = new PlayerDAO($host, $dbname, $username, $psw);
$bdd->start();


if (isset($_POST['envoyer'])){

    $name = htmlspecialchars($_POST['name']);
    $money = 500;
    $passwrd = htmlspecialchars($_POST['passwrd']);

    $newPlayer = new PlayerDTO($name, $passwrd, $money);

    if ($_POST['name'] != ""){
        if ($_POST['passwrd'] != ""){
            // Si les cases ne sont pas vides alors méthode addPlayer et affichage message
            $bdd->addPlayer($name, $passwrd);
            echo "Votre compte a bien été enregistré.";
        }
    }
}

// Inclusion de la partie graphique
include("../view/inscriptionView.php");

?>