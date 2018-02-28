<?php 
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
        //Fonction parite (renvoie true si gagné en choisissant la parité)
        function parite ($parite){
            // selection d'un num random entre 1 et 36
            $num2=rand(1,36);
            echo "La bille s'est arrêtée sur le numéro ".$num2." !<br>";
            // comparaison avec la parité choisi
            if($num2%2==$parite){
                return true;
            }else{
                return false;
            }
        }
        
        //Fonction nbr (renvoie true si gagné en choisissant un nombre)
        function nbr ($nombre){
             // selection d'un num random entre 1 et 36
            $num = rand(1,36);
            echo "La bille s'est arrêtée sur le numéro ".$num." !<br>";
            // comparaison avec le nombre choisi  
            if($nombre==$num){
                return true;
            }
            else{
                return false;
            }
        }

        //Fonction perdrePartie (renvoie true si plus d'argent dans la cagnotte)
        function perdrePartie ($argent){
            if ($argent == 0){
                return true;
            }else{
                return false;
            }
        }

        // Si le bouton jouer est pressé
        if(isset($_POST['button'])){
            $miseMax = $_SESSION['argent'];
            $sommeMisee = $_POST['mise'];
            
            //Test si la variable choix existe
            if(isset($_POST['choix'])){
                $choix=$_POST['choix'];
                //Test valeur du choix de parite (si pair =0; sinon =1)
                if($_POST['choix']=="pair"){
                    $parite=0;
                }else{
                    $parite=1;
                }
            }
            
            //Test si la variable nombre existe
            if(isset($_POST['nombre'])){
                $choixNb = $_POST['nombre'];
            }

            if($sommeMisee<=$miseMax && $sommeMisee>0){
                if($choixNb>0){
                    echo "Vous avez choisi de miser sur le nombre ";
                    echo $choixNb." !<br><br>";
                    echo "Les jeux sont faits.<br>Rien ne va plus...<br><br>";
                    if (nbr ($_POST['nombre'])==1){
                        echo "Vous avez gagné !<br><br>";
                        $_SESSION['argent'] = $_SESSION['argent'] + ($sommeMisee * '34');
                    }
                    else{
                        echo "Vous avez perdu !<br><br>";
                        $_SESSION['argent'] = $_SESSION['argent'] - $sommeMisee;
                    }
                }else if($parite<2){
                    echo "Vous avez choisi de miser sur les valeurs ";
                    if($parite==0){
                        echo "pair !<br><br>";
                    }else{
                        echo "impair !<br><br>";
                    }
                    echo "Les jeux sont faits.<br>Rien ne va plus...<br><br>";
                    if (parite($parite)==1){
                        echo "Vous avez gagné !<br><br>";
                        $_SESSION['argent'] = $_SESSION['argent'] + $sommeMisee;
                    }
                    else{
                        echo "Vous avez perdu !<br><br>";
                        $_SESSION['argent'] = $_SESSION['argent'] - $sommeMisee;
                    }
                }else{
                    echo "Rien ne va !<br><br>";
                }
                if(perdrePartie($_SESSION['argent'])){
                    echo "Votre cagnotte est vide !!!<br>";
                }else{
                    echo "Faites vos jeux !<br>";
                }
            }
        }
        ?>
        
        <form action="/php_roulette/roulette.php" method="post">
            <table id=affichage>
                <tr class=ligne>
                    <td class=nom colspan="2"><h2 class="name"><?php echo $_SESSION['nom'] ?></h2></td>
                </tr>
                <tr class=ligne>
                    <td class=cagnotte colspan="2"><h3>Vous avez <?php echo $_SESSION['argent']?> € dans votre cagnotte</h3></td>
                </tr>
                <tr class=ligne>
                    <td class=mise colspan="2"><input type="number" name="mise" min="1" placeholder="Votre mise"/></td>
                </tr>
                <tr class=ligne>
                    <td class="choixMise"><label>Miser sur un nombre</label><input checked type="radio" name= "choixtype" id="nombre" value="miseNombre"/></td>
                    <!-- <td>
                        <label class="MiseNombreParite">
                        <input type="checkbox">
                        <span class="nombreParite" id="choixNombreParite"></span>
                        </label>
                    </td> -->
                    <td class="choixMise"><label>Miser sur la parité</label><input type="radio" name="choixtype" id="parite" value="miseParite"/></td>
                </tr>
                <tr class=ligne id="choix">
                    <td id=choixNombre for="nombre"><span id="choixNombre"><div class="miseNombre">
                        <label for="miseNombre" >Misez sur un nombre</label><br>
                        <input type="number" name = "nombre" min = "1" max = "36"/>
                        </div></span></td>
                    <td id=choixParite for="parite"><span id="choixParite"><div class="miseParite">
                        <label for="miseParite">Misez sur la parité</label><br> 
                        <label>Pair</label> <input type="radio" name= "choix" id="pair" value="pair"/> 
                        <label>Impair</label> <input type="radio" name="choix" id="impair" value="impair"/> 
                    </div></span></td>
                </tr>
                <tr class=ligne>
                    <td class=jouer colspan="3"><div class="buttonJouer">
                        <input type="hidden" value="play" name="bouton">
                        <input type="submit"  value="Jouer" name = "button">
                    </div></td>
                </tr>
            </table>
        </form>
        <a href="/php_roulette/connexion.php?getdeco">Se déconnecter</a>
        
    </body>

</html>