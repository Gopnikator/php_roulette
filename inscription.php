<DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <title> Roulette - inscription</title>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
    </head>
    
    <body>
        
    <h1 class="titre-index">Inscrivez-vous au jeu de la roulette</h1>
    
        <form action="/php_roulette/connexion.php" method="post">
        <div>
           <input type="text" id="nom" placeholder="nom"/>
        </div>
        <div>
            <input type="password" id="mdp" placeholder = "mdp"/>
        </div>
        
        <div class="buttonSend">
            <button type="submit">s'inscrire</button>
        </div>
            
        
        </form>  
        
    <?php  
    ?>
    
    </body>


</html>