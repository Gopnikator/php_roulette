<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Roulette - jeu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" />
</head>

<body>

<h1 class="titre-index">Le jeu de la roulette </h1> <img id="img_roulette" src="../roulette.gif" alt="Roulette">

<p class= "phrase">Bonjour <?php echo $_SESSION['name'] ?>. Tu as <?php echo $_SESSION['money']?> € de thune;</p> <br>
<form class=center action="../controller/controllerRoulette.php" method="post">
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

<a class="aDroite"  href="../index.php?getdeco">Se déconnecter</a>





<?php

?>

</body>


</html>