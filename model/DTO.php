<?php
Class PlayerDTO
{
    // variables de classe
    private $name;
    private $passwrd;
    private $money;

//CONSTRUCTEUR
    public function __construct($name, $passwrd, $money){
        $this->name=$name;
        $this->passwrd=$passwrd;
        $this->money=$money;
    }

// GETTERS
    public function getUsername()
    {
        return ($this->name);
    }

    public function getPsw()
    {
        return ($this->passwrd);
    }

    public function getmoney()
    {
        return ($this->money);
    }

// SETTERS
    function setUsername($name)
    {
        $this->username->$name;
    }

    function setPsw($passwrd)
    {
        $this->passwrd->$passwrd;
    }

    function setMoney($money)
    {
        $this->money->$money;
    }
}