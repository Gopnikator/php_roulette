<?php

class PlayerDAO {
// variables de classe
    private $bdd;
    private $host;//='localhost';
    private $dbname;// = 'p1702775';
    private $username;// = 'p1702775';
    private $psw;// = '296054';

// CONSTRUCTEUR
   public function __construct($host, $dbname, $username, $psw){
        $this->host=$host;
        $this->dbname=$dbname;
        $this->username=$username;
        $this->psw=$psw;
    }

    // METHODES
    // initialisation de la base
    public function start() {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=p1702775;charset=utf8', 'p1702775', '296054', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }
    // fonction de connexion a la BDD
    public function connexion($name, $passwrd){
        $requete = 'SELECT * FROM Player WHERE name = :t_name AND passwrd = :t_passwrd;';
        $req = $this->bdd->prepare($requete);
        $req->execute(array(':t_name' => $name, ':t_passwrd' => $passwrd));
        $result = $req->fetch();
        $nb_result = count($result);
        $req->closeCursor();
        return $nb_result;
    }
    // fonction ajout d'un joueur dans la base de données
    public function addPlayer($name, $passwrd){
        $requete = $this->bdd->prepare('INSERT INTO Player(id, name, passwrd, money) VALUES(:id, :name, :passwrd, :money)');
        $requete->execute(array(
            'id' => "",
            'name' => $name,
            'passwrd' => $passwrd,
            'money' => 500,
        ));
    }

    // Les fonctions suivantes n'ont pas encore pu etre implémentées
    // Mettre a jour l'argent du joueur dans la base
   public function updateMoney($id, $name){
        $requete = $this->bdd->prepare('UPDATE Player SET money = :newMoney WHERE player = :player_name');
        $requete->execute(array(
            'newMoney' => $newMoney,
            'player_name' => $name,
        ));
    }

    // Ajout d'une partie dans la table Game pour un joueur détérminé
    public function addGame($player, $bet, $profit){
        $requete = $this->bdd->prepare('INSERT INTO Game(player, date, bet, profit) VALUES(:player, NOW(), :bet, :profit)');
        $requete->execute(array(
            'player' => $player,
            'bet' => $bet,
            'profit' => $profit,
        ));
    }
}