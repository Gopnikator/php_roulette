<?php 
session_start(); #session >

require_once("bdd.php");
$bdd = new BaseDonnees();
$bdd->start();

$error="";

?>

<DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <title> Roulette - jeu</title>    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
    </head>
    
    <body>
        
    <h1 class="titre-index">Le jeu de la roulette </h1> <img id="img_roulette" src="roulette.gif" alt="Roulette"> 
             
       
<?php

        function parite ($parite){
            // selection d'un num random entre 1 et 36
            $num2=rand(1,36);
            echo "Le numéro tombé est ".$num2;
            $num2=$num2%2;
            echo "  //  ";
            echo $num2;
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
            echo "Le numéro tombé est ".$num;
            echo "  //  ";
            // comparaison avec le nombre choisi  
            if($nombre==$num){
                return true;
            }
            else{
                return false;
            }
        }                
        
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
            echo $choix;?><br><?php
            if($_POST['choix']=="pair"){
                $parite=0;
                echo "Vous avez choisi pair";?><br><?php
            }else if($_POST['choix']=="impair"){
                $parite=1;
                echo "Vous avez choisi impair";?><br><?php
            }else{
                echo "ERREUR";
            }
        }
        if(isset($_POST['nombre'])){
            $choixNb = $_POST['nombre'];
            echo $choixNb;?><br><?php
        }
            
    
    
    if($sommeMisee<$miseMax && $sommeMisee>0){
        if($choixNb>0){
            echo "<br> Vous avez choisi de miser sur le nombre ";
            echo $choixNb;
            echo " !<br>Les jeux sont faits<br>.<br>.<br>.<br>Rien ne va plus...<br>.<br>.<br>.<br>";
            if (nbr ($_POST['nombre'])==1){
                echo "<br> Vous avez gagné ! <br>";
                $_SESSION['money'] = $_SESSION['money'] + ($sommeMisee * '34');
            }
            else{
                echo "<br> Vous avez perdu ! <br>";
                $_SESSION['money'] = $_SESSION['money'] - $sommeMisee;
            }
        }else if($parite<2){
            echo "<br> Vous avez choisi de miser sur la parité !<br>Les jeux sont faits<br>.<br>.<br>.<br>Rien ne va plus...<br>.<br>.<br>.<br>";
            if (parite($parite)==1){
                echo "<br> Vous avez gagné ! <br>";
                $_SESSION['money'] = $_SESSION['money'] + $sommeMisee;
            }
            else{
                echo "<br> Vous avez perdu ! <br>";
                $_SESSION['money'] = $_SESSION['money'] - $sommeMisee;
            }
        }else{
            echo "T'as pas cliqué gros";
        }
        if(perdrePartie($_SESSION['money'])){
            echo "<br>  VOUS ETES A SEC !!! Sale pauvre :O <br>";
        }
    }
 }         
?>    
  <p class= "phrase">Bonjour <?php echo $_SESSION['name'] ?>. Tu as <?php echo $_SESSION['money']?> € de thune;</p> <br>
    <form class=center action="roulette.php" method="post">
    <div >    
        <div>
            <input class="form-group" type="number" name="mise" placeholder="Votre mise" min=1 max = 500/><br><br>
        </div>

        <div>
            <label for="miseNombre">Misez sur un nombre</label>
            <input class="form-group" type="number" name = "nombre" min = "1" max = "36"/><br><br> 
        </div>

        <div> OU </div>

        <div class="aligner paparite">
            <label id="decaDroite" for="miseParité ">Misez sur la parité</label>  <br> 
            <label>Pair</label> <input type="radio" name= "choix" id="pair" value="pair"/> 
            <label>Impair</label> <input type="radio" name="choix" id="impair" value="impair"/> 
            <input type="hidden" value="play" name="bouton">
        </div>
        <input type="submit"  value="Jouer" name = "button">
    
        </div> 
    </form>  
        
    <a class="aDroite"  href="connexion.php?getdeco">Se déconnecter</a>
        
    
    
        
        
    <?php 
       
    ?>
    
    </body>


</html>