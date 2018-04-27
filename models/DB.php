<?php

class DB 
{
    private $hote;
  	private $login;
  	private $mdp;
  	private $base;
 
	public function __construct() 
	{
	    $this->host = 'localhost' ;
	    $this->base = 'iim_a4_lokisalle';
	    $this->user = 'root';
	    $this->mdp = 'password';
	}
    
    public function connect()
    {
        try {
            $bdd = new PDO('mysql:host='.$this->hote.';dbname='.$this->base, $this->user, $this->mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (Exception $e) {
    	    die('Erreur : '. $e->getMessage());
        }
    
        return $bdd;
    }
}

?>
