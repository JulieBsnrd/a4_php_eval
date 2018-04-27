<?php

require_once 'DB.php';

class Commande
{
	/** var int */
	public $id;

	/** var int */
	public $id_membre;

	/** var int */
	public $id_produit;

	/** var string */
	public $date_enregistrement;


	public function __construct($id, $id_membre, $id_produit, $date_enregistrement) 
	{
		$date = DateTime::createFromFormat('Y-m-d H:i:s', $date_enregistrement);
		$this->id = $id;
		$this->id_membre = $id_membre;
		$this->id_produit = $id_produit;
		if(!empty($date)){
			$this->date_enregistrement = $date->format('M d, Y');
		}
		
    }

    public static function all()
    {
    	$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM commande');
	    $req->execute();

	    $commandes = [];

	    foreach($req->fetchAll() as $commande) {
	    	$commandes[] = new Commande($commande['id'], $commande['id_membre'], $commande['id_produit'], $commande['date_enregistrement']);
	    }

	    return $commandes;
    }

    public static function find($id)
    {
    	$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM commande WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $commande = $req->fetch();
	    $commande = new Commande($commande['id'], $commande['id_membre'], $commande['id_produit'], $commande['date_enregistrement']);

	    return $commande;
    }

    public static function findAllByUser($id_membre)
    {
    	$db = DB::getInstance();
    	$req = $db->prepare('SELECT * FROM commande WHERE id_membre = :id_membre');
	    $req->bindParam(':id_membre', $id_membre);
	    $req->execute();

	    $commandes;

	    foreach($req->fetchAll() as $commande) {
	    	$commandes[] = new Commande($commande['id'], $commande['id_membre'], $commande['id_produit'], $commande['date_enregistrement']);
	    }

	    return $commandes;
    }

    // @todo, do in controller : new Command($_POST)
    // and use $this here instead of $_POST
	public static function create()
	{
		$db = DB::getInstance();
		$sql = "INSERT INTO commande SET id_membre = :id_membre, id_produit = :id_produit, date_enregistrement = :date_enregistrement";
		$req = $db->prepare($sql);
		$req->execute(array(
			':id_membre' => $_POST['id_membre'],
			':id_produit' => $_POST['id_produit'],
			':date_enregistrement' => date('Y-m-d H:i:s')
		));

	    return true;
	}

	public static function update($commandeId)
	{
		$db = DB::getInstance();
		$sql = "UPDATE commande SET id_membre = :id_membre, id_produit = :id_produit WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->execute(array(
			':id_membre' => $_POST['id_membre'],
			':id_produit' => $_POST['id_produit'],
			':id' => $commandeId
		));

		return true;
	}

    public static function delete($id)
    {
    	$db = DB::getInstance();
    	$req = $db->prepare('DELETE FROM commande WHERE id = :id');
		$req->bindParam(':id', $id);
		$req->execute();

		if (Commande::find($id)) {
			echo "La suppression a échoué";
			return false;
		} else {
			echo "La commande a bien été supprimée";
			return true;
		}
    }
}

?>