<?php
    session_start();
    require once("https://iutdoua-web.univ-lyon1.fr/~p1702775/php_roulette/bdd.php");

    $nvlBDD = new bdd('localhost','Player','p1702775','308410');
    $nvlBDD->start();

    if (isset($_POST['envoyer'])){
        if ($_POST['name'] != ""){
            if ($_POST['passwrd'] != ""){
                $nvlBDD->addPlayer($_POST['name'], $_POST['passwrd']);
                header("Location: https://iutdoua-web.univ-lyon1.fr/~p1702775/php_roulette/index.php");
            }
        }
    }

?>


<DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <title> Roulette - inscription</title>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
    </head>
    
    <body>
        
    <h1 class="titre-index margin-btm">Inscrivez-vous au jeu de la roulette</h1>
    
        <form class="center" action="https://iutdoua-web.univ-lyon1.fr/~p1702775/php_roulette/connexion.php" method="post">
           <div class="aligner margin-btm reg">
                <div>
                   <input class="form-control mb-2 mr-sm-2" type="text" name="name" placeholder="nom"/>
                </div>
                <div>
                    <input class="form-control mb-2 mr-sm-2" type="password" name="passwrd" placeholder = "mdp"/>
                </div>
            </div> 
        <div class="center margin-left" >
            <button type="submit" name="envoyer">s'inscrire</button>
        </div>
            
        
        </form>  
        
    <?php  
    ?>
    
    </body>


</html>