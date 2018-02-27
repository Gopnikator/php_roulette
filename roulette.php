// mettre session au départ<?php 
session_start(); #session >
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
        
    <h1 class="titre-index">Le jeu de la roulette</h1>
             
       
<?php
        $argent=$_SESSION['argent'];
        echo $argent . " €";

        function parite ($parite){
            // selection d'un num random entre 1 et 36
            $num=rand(1.36);
            // comparaison avec la parité choisi
            if($num%2==$parite){
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
        
        function perdrePartie ($argent){
            if ($argent == 0){
                return true;
            }else{
                return false;
            }
        }         
        
    // Si le bouton jouer est pressé alors
    if(isset($_POST['bouton'])){
        $miseMax = $argent;
        $sommeMisee = $_POST['mise'];
        $choixNb = $_POST['nombre']
            if($_POST['choix']=='pair'){
                $parite=0;
            }else if($_POST['choix']=='impair'){
                $parite=1;
            }else{
                echo "ERREUR";
            }
            
    }
    
    if($sommeMisee<$miseMax && $sommeMisee>0){
        if(isset($_POST['Parite'])){
            if (parite($parite)==1){
                echo "<br> Vous avez gagné ! <br>";
                $argent = $argent + $sommeMisee;
            }
            else{
                echo "<br> Vous avez perdu ! <br>";
                $argent = $argent - $sommeMisee;
            }
        }else if(isset($_POST['nombre'])){
            if (nbr ($nombre)==1){
                echo "<br> Vous avez gagné ! <br>";
                $argent = $argent + ($sommeMisee * 34);
            }
            else{
                echo "<br> Vous avez perdu ! <br>";
                $argent = $argent - $sommeMisee;
            }
        }else{
            echo "T'as pas cliqué gros";
        }
        if(perdrePartie($argent)){
            echo "<br> VOUS ETES A SEC !!! Sale pauvre :O <br>";
        }
    }
}          
?>    
        
    <form action="/php_roulette/roulette.php" method="post">
    <div>
        <input type="text" name="mise" placeholder="Votre mise" min=1 max = 500/>
    </div>
        
    <div>
        <label for="miseNombre">Misez sur un nombre</label>
        <input type="number" name = "nombre" min = "1" max = "36"/>
    </div>
    
    <div> OU </div>
       
    <div>
        <label for="miseParité ">Misez sur la parité</label>  <br> 
        <label>Pair</label> <input type="radio" name= "choix" id="pair" /> 
        <label>Impair</label> <input type="radio" name="choix" id="impair" /> 
    </div>
        

    <div class="buttonJouer">
        <input type="hidden" value="play" name="bouton">
        <input type="submit"  value="Let's begin!" name = "jouer">
    </div>    
        
    </form>  
        
    <a href="/php_roulette/connexion.php?getdeco">Se déconnecter</a>
    
        
        
    <?php 
       
    ?>
    
    </body>


</html>