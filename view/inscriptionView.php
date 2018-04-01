<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Roulette - inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" />
</head>

<body>

<h1 class="titre-index margin-btm">Inscrivez-vous au jeu de la roulette</h1>

<form class="center" action="../controller/controllerInscription.php" method="post">
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

<p class="register"><a href="../index.php"> Retournez à l'acceuil</a></p>

<?php
?>

</body>


</html>