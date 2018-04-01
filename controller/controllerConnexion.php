<?php
session_start(); #session

require("../model/DAO.php");
require("../model/DTO.php");

$error="";

//variables  à envoyer pour la création d'un objet BDD
$host ='localhost';
$dbname = 'p1702775';
$username = 'p1702775';
$psw = '296054';

// création d'un objet BDD et initialisation de la BDD
$bdd = new PlayerDAO($host, $dbname, $username, $psw);
$bdd->start();

#traitement de la déco
if(isset($_GET['getdeco'])){
    #je vide ma session
    unset($_SESSION['name']);
    unset($_SESSION['money']);
    unset($_SESSION['passwrd']);
}

#traite le formulaire de connexion
if(isset($_POST['send'])){
    ### vérifie données
    if(isset($_POST['name']) && ($_POST['name'] != '' )/*username existe*/){
        if(isset($_POST['passwrd']) && ($_POST['passwrd'] != '' )/*mdp existe*/){
            $usrname = htmlspecialchars($_POST['name']);
            $mdp = htmlspecialchars($_POST['passwrd']);

            // stockage de la méthode connexion dans une variable pour pouvoir déclencher la connexion (si >0, alors la personne est dans la base)
            $nb_result = $bdd->connexion($usrname,$mdp);
            if(!$nb_result){
                echo "mauvais ID or MDP";
            }
            else{
                if ($nb_result > 0){
                    if (!session_id()) session_start();
                    $_SESSION['name'] = $result['name'];
                    $_SESSION['passwrd'] = $result['passwrd'];
                    $_SESSION['money'] = 500;
                    header("Location: controllerRoulette.php");
                }
            }
        } else {
            $error = "mdp NOK";}
    } else {
        $error = "user NOK";
    }
}

// Inclusion de la partie graphique
include("../view/indexView.php");

?>
