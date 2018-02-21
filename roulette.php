// mettre session au départ<?php session_start(); #session >

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
                
        function tourRouletteParitePair ($parite){
            // selection d'un num random entre 1 et 36
            $num = rand(1,36);
            $pairImpair = "";
            //selection si pair ou impair
            if($num%2!=0){
                $pairImpair = "impair";
            }
            else{
                $pairImpair = "pair";
            }       
            if ($pairImpair == $parite){
                return false;
            }
            else{
                return true;
            }
        }
        
        function tourRoulettePariteImpair ($parite){
            // selection d'un num random entre 1 et 36
            $num = rand(1,36);
            $pairImpair = "";
            //selection si pair ou impair
            if($num%2!=0){
                $pairImpair = "impair";
            }
            else{
                $pairImpair = "pair";
            }       
            if ($pairImpair == $parite){
                return true;
            }
            else{
                return false;
            }
        }
        
        function tourRouletteNombre ($nombre){
             // selection d'un num random entre 1 et 36
            $num = rand(1,36);
            $nombre = 0;
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
            }
            else{
                return false;
            }
        }         
        
// Si le bouton jouer est pressé alors
if(isset($_POST['bouton'])){
    
        $miseMax = $argent;
        $guess = $_POST['nombre'];
        $bool = 0;
        $bool2 = 0;
        $sommeMisee = $_POST['mise'];
        //$choixParite = $_POST['choix'];
        //$choixNb = $_POST['nombre']
    
    if(isset($_POST['ParitePair'])){
        $bool = tourRouletteParitePair($choix);
        if ($bool==1){
            echo "<br> Vous avez gagné ! <br>";
            $argent = $argent - $sommeMisee + ($sommeMisee * 2);       
        }
        else{
            echo "<br> Vous avez perdu ! <br>";
            $argent = $argent - $sommeMisee;
        }
    }
    if(isset($_POST['PariteImpair'])){
        $bool = tourRoulettePariteImpair($choix);
        if ($bool==1){
            echo "<br> Vous avez gagné ! <br>";
            $argent = $argent - $sommeMisee + ($sommeMisee * 2);
        }
        else{
            echo "<br> Vous avez perdu ! <br>";
            $argent = $argent - $sommeMisee;
        }
    }
    if(isset($_POST['nombre'])){
        $bool = tourRouletteNombre($sommeMisee);
        if ($bool==1){
            echo "<br> Vous avez gagné ! <br>";
            $argent = $argent - $sommeMisee + ($sommeMisee * 35);
        }
        else{
            echo "<br> Vous avez perdu ! <br>";
            $argent = $argent - $sommeMisee;
        }
    }
    
    $bool2 = perdrePartie($argent);
    if ($bool2 == 1){
        echo "vous n'avez plus de sous";
    }
                
    echo $argent;
    echo " €";   
}          
?>    
        
    <form action="/TP roulette/roulette.php" method="post">
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
        <label>Pair</label> <input type="radio" name= "choixPair" id="pair" /> 
        <label>Impair</label> <input type="radio" name="choixImpair" id="impair" /> 
    </div>
        

    <div class="buttonJouer">
        <input type="hidden" value="play" name="bouton">
        <input type="submit"  value="Let's begin!" name = "jouer">
    </div>    
        
    </form>  
        
    <a href="/TP roulette/connexion.php?getdeco">Se déconnecter</a>
    
        
        
    <?php 
       
    ?>
    
    </body>


</html>