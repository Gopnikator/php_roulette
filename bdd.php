<?php

class BaseDonnees {
    private $BDD;
    private $host='localhost';
    private $dbname = 'Player';
    private $username = 'p1702775';
    private $psw = '308410';
    
    public function __construct($host, $dbname, $username, $psw){
        $this->host=$host;
        $this->dbname=$dbname;
        $this->username=$username;
        $this->psw=$psw;
    }
    
    public function getBDD{
        return($this->BDD);
    }
    public function getHost{
        return($this->host);
    }
    public function getDbname{
        return($this->dbname);
    }
    public function getUsername{
        return($this->username);
    }
    public function getPsw{
        return($this->psw);
    }
    
    
    public function setBDD{
        $this->BDD->$BDD
    }
    public function setHost{
        $this->host->$host
    }
    public function setDbname{
        $this->dbname->$dbname
    }
    public function setUsername{
        $this->username->$username
    }
    public function setPsw{
        $this->psw->$psw
    }
    
    
    
    public function start() {    
        try
        {
            $this->$BDD = new PDO('mysql:host=localhost;dbname=test;charset=utf8', $this->username, $this->psw);
        }
        catch(Exception $e)
        {
                die('Error : '.$e->getMessage());
        }
    }

    public function connexion($name, $passwrd){
            $requete='SELECT passwrd FROM Player where name = ?';
            $reponse==$this->BDD->prepare($requete);
            $reponse->execute(array($name)); 
            $data = $reponse->fetch();
            return $reponse['passwrd']==$passwrd;
    }

    public function addPlayer ($name, $passwrd){
        $requete = $this->$BDD->prepare('INSERT INTO Player(name, passwrd, money) VALUES(:name, :passwrd, :money)');
        $requete->execute(array(
            'name' => $name,
            'passwrd' => $passwrd,
            'money' => 500,
            ));
    }

    public function updateMoney($id, $name){
            $requete = $this->$BDD->prepare('UPDATE Player SET money = :newMoney WHERE player = :player_name');
            $requete->execute(array(
               'newMoney' => $newMoney,
               'player_name' => $name,
        ));
    }

    public function addGame($player, $bet, $profit){
            $requete = $this->$BDD->prepare('INSERT INTO Game(player, date, bet, profit) VALUES(:player, NOW(), :bet, :profit)');
            $requete->execute(array(
            'player' => $player,
            'bet' => $bet,
            'profit' => $profit,        
        ));
    }
}
