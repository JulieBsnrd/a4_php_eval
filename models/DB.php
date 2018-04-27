<?php

class DB 
{
    private $hote;
  	private $login;
  	private $mdp;
  	private $base;

    static protected $_instance = null;
    protected $_db;

    static public function getInstance()
    {
      if(is_null(self::$_instance))
        self::$_instance = new DB();

      return self::$_instance;
    }
 
	public function __construct() 
	{
    include('config\config.php');
    $this->_db = new PDO(
      "mysql:host=".$hote.";dbname=".$base.";charset=utf8",
      $user,
      $mdp
      );
	    /*$this->host = 'localhost' ;
	    $this->base = 'iim_a4_lokisalle';
	    $this->user = 'root';
	    $this->mdp = 'password';*/
	}
    
    /*public function connect()
    {
        try {
            $bdd = new PDO('mysql:host='.$this->hote.';dbname='.$this->base, $this->user, $this->mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (Exception $e) {
    	    die('Erreur : '. $e->getMessage());
        }
    
        return $bdd;
    }*/
    public function query($requete)
    {
      try
      {
        $resultat = $this->_db->query($requete);
      }
      catch(PDOException $e)
      {
        print 'Erreur PDO : '.$e->getMessage().'<br/>';
        die();
      }
      return $resultat;
    }

    public function __call($methode, array $arg) {
      // Si on appelle une méthode qui n'existe pas, on 
      // delegue cet appel à l'objet PDO $this->_db
      return call_user_func_array(array($this->_db, $methode), $arg);
    }
}

?>
