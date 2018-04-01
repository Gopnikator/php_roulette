<?php
session_start(); #session >

require("../model/DAO.php");
require("../model/DTO.php");

$error="";

function parite ($parite){
    // selection d'un num random entre 1 et 36
    $num2=rand(1,36);
    $num2=$num2%2;
    // comparaison avec la parité choisi
    if($num2%2==$parite){
        return true;
    }else{
        return false;
    }
}

function nbr ($nombre){
    // selection d'un num random entre 1 et 36
    $num = rand(1,36);
    // comparaison avec le nombre choisi
    if($nombre==$num){
        return true;
    }
    else{
        return false;
    }
}

// si la somme d'argent = 0 le joueur a perdu
function perdrePartie ($money){
    if ($money == 0){
        return true;
    }else{
        return false;
    }
}

// Si le bouton jouer est pressé alors
if(isset($_POST['button'])){
    $miseMax = $_SESSION['money'];
    $sommeMisee = $_POST['mise'];
    if(isset($_POST['choix'])){
        $choix=$_POST['choix'];
        if($_POST['choix']=="pair"){
            $parite=0;
        }else if($_POST['choix']=="impair"){
            $parite=1;
        }else{
            echo '<p class="textRoulette">ERREUR</p>';
        }
    }
    if(isset($_POST['nombre'])){
        $choixNb = $_POST['nombre'];
        echo $choixNb;
    }



    if($sommeMisee<$miseMax && $sommeMisee>0){
        if($choixNb>0){
            echo '<p class="textRoulette">Vous avez choisi de miser sur un nombre. Les jeux sont faits. Rien ne va plus...</p>';
            if (nbr ($_POST['nombre'])==1){
                echo '<p class="textRoulette">Vous avez gagné ! </p>';
                $_SESSION['money'] = $_SESSION['money'] + ($sommeMisee * '34');
            }
            else{
                echo '<p class="textRoulette">Vous avez perdu ! </p>';
                $_SESSION['money'] = $_SESSION['money'] - $sommeMisee;
            }
        }else if($parite<2){
            echo ' <p class="textRoulette">Vous avez choisi de miser sur la parité. Les jeux sont faits. Rien ne va plus...</p>';
            if (parite($parite)==1){
                echo ' <p class="textRoulette">Vous avez gagné ! </p>';
                $_SESSION['money'] = $_SESSION['money'] + $sommeMisee;
            }
            else{
                echo ' <p class="textRoulette">Vous avez perdu ! ';
                $_SESSION['money'] = $_SESSION['money'] - $sommeMisee;
            }
        }else{
            echo '<p class="textRoulette">Il faut cliquer</p>';
        }
        if(perdrePartie($_SESSION['money'])){
            echo '<p class="textRoulette">VOUS ETES A SEC !!! Sale pauvre :O </p>';
        }
    }
}

// Inclusion de la partie graphique
include("../view/rouletteView.php");