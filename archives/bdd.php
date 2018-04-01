<?php

class BaseDonnees {
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
// GETTERS
    public function getBdd(){
        return($this->bdd());
    }
    public function getHost(){
        return($this->host);
    }
    public function getDbname(){
        return($this->dbname);
    }
    public function getUsername(){
        return($this->username);
    }
    public function getPsw(){
        return($this->psw);
    }

// SETTERS
    public function setBdd($bdd){
        $this->bdd->$bdd;
    }

    public function setHost($host){
        $this->host->$host;
    }
    public function setDbname($dbName){
        $this->dbname->$dbname;
    }
    public function setUsername($username){
        $this->username->$username;
    }
    public function setPsw($passwrd){
        $this->psw->$psw;
    }

// METHODES
    // Initialisation de la BDD
    public function start() {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=p1702775;charset=utf8', 'p1702775', '296054', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }
    // Connexion d'un joueur
    public function connexion($name, $passwrd){
        $requete = 'SELECT * FROM Player WHERE name = :t_name AND passwrd = :t_passwrd;';
        $req = $this->bdd->prepare($requete);
        $req->execute(array(':t_name' => $name, ':t_passwrd' => $passwrd));
        $result = $req->fetch();
        $nb_result = count($result);
        $req->closeCursor();
        return $nb_result;
    }

    // Je n'ai pas eu le temps d'implémenter dans le code les fonctions suivantes
    // ajout d'un joueur dans la BDD
    public function addPlayer($name, $passwrd){
        $requete = $this->bdd->prepare('INSERT INTO Player(id, name, passwrd, money) VALUES(:id, :name, :passwrd, :money)');
        $requete->execute(array(
            'id' => "",
            'name' => $name,
            'passwrd' => $passwrd,
            'money' => 500,
        ));
    }

    // Rajouter de l'argent sur la partie d'un joueur
    public function updateMoney($id, $name){
        $requete = $this->bdd->prepare('UPDATE Player SET money = :newMoney WHERE player = :player_name');
        $requete->execute(array(
            'newMoney' => $newMoney,
            'player_name' => $name,
        ));
    }

    // rajout d'une partie pour un joueur
    public function addGame($player, $bet, $profit){
        $requete = $this->bdd->prepare('INSERT INTO Game(player, date, bet, profit) VALUES(:player, NOW(), :bet, :profit)');
        $requete->execute(array(
            'player' => $player,
            'bet' => $bet,
            'profit' => $profit,
        ));
    }
}


/*Ancienne fonction avant de mettre sous format POO
try {
    $bdd = new PDO('mysql:host=localhost;dbname=p1702775;charset=utf8', 'p1702775', '296054', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

*/