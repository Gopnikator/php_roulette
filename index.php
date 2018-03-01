<?php 
session_start(); #session
//$temps = 365*24*3600; // durée de vie du cookie de 1 an
//setcookie("nom",$_POST['name'],time()+$expire);
//setcookie("mdp",$_POST['passwrd'],time()+$expire);
//setcookie("thune",$_POST['money'],time()+$expire);

require once("https://iutdoua-web.univ-lyon1.fr/~p1702775/php_roulette/bdd.php");
$bdd= new BaseDonnees();
$bdd->start();


#traitement php
$error=";";


#traitement de la déco
if(isset($_GET['getdeco'])){
    #je vide ma session
    unset($_SESSION['name']);
    unset($_SESSION['money']);
    unset($_SESSION['passwrd']);
}

//var_dum($_SESSION);

#traite le formulaire de connexion
if(isset($_POST['send'])){
    ### vérifie données
    if(isset($_POST['name']) && ($_POST['name'] != '' )/*username existe*/){
       if(isset($_POST['passwrd']) && ($_POST['passwrd'] != '' )/*mdp existe*/){
            if ($bdd -> connexion($_POST['name'],$_POST['passwrd'])){
                header("Location: https://iutdoua-web.univ-lyon1.fr/~p1702775/php_roulette/roulette.php");
            }
        } else {
            $error = "mdp NOK";} 
    } else {
        $error = "user NOK";  
    }  
}


?>

 

<DOCTYPE html>
    
    
    
<html>
    <head>
    <meta charset="utf-8" />
        <title> Roulette - connexion</title>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
        
    </head>
    
    <body>
    
<h1 class="titre-index">Connectez vous pour jouer à la roulette</h1>

<br>
        
<?php
    if($error != "");
        echo "Une erreur est apparue ";
    ?>       
        
<form class="center" action="https://iutdoua-web.univ-lyon1.fr/~p1702775/php_roulette/index.php" method="post">
    <div class="aligner">
        <label class="sr-only" for="inlineFormInputName2"></label>
        <input type="text" class="form-control mb-2 mr-sm-2" name="name" placeholder="name"/>
        <label for="exampleInputPassword2"></label>
        <div class="input-group mb-2 mr-sm-2">
            <input type="password" class="form-control" name="passwrd" placeholder = "mdp"/>
        </div>
    </div>
    <br>
    <div class="center">
        <button class="btn btn-dark mb-2" type="reset">Effacer</button>
        <button class="btn btn-dark mb-2" type="submit" name = "send">Commencer</button>
    </div>
</form>
    

      
<div class="container">
    <p class="text-center">La roulette est un jeu de hasard. Elle comporte 36 cases numérotées de 1 à 36, une bille est lancée dedans et s'arrête à un moment dans une case. Le but est de prévoir où la bille va s'arrêter en misant sur le résultat.</p>
    <p class="text-center">Les règles sont ici simplifiées:</p>
    <p class="text-center">- Avant de lancer la bille, le joueur mise de l'argent. Il peut miser sur le réultat exact ou sur sa parité.</p>
    <p class="text-center">- Si le joueur mise sur un nombre et que la bille tombe dans la case numérotée à ce nom, le joueur gagne 35 fois sa mise.</p>
    <p class="text-center">- Si le joueur mise sur la parité du résultat (le résultat est pair ou impair) et qu'il voit juste, il gagne deux fois sa mise.</p>
</div>
    
        
<p class="register"><a href="https://iutdoua-web.univ-lyon1.fr/~p1702775/php_roulette/inscription.php"> OU INSCRIVEZ-VOUS</a></p>
    </body>


</html>