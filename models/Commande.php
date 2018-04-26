<?php

require 'DB.php';

class Commande
{
	/** var int */
	protected $id;

	/** var int */
	protected $id_membre;

	/** var int */
	protected $id_produit;

	/** var string */
	protected $date_enregistrement;


	public function __construct($id, $id_membre, $id_produit, $date_enregistrement) 
	{
		$this->id = $id;
		$this->id_membre = $id_membre;
		$this->id_produit = $id_produit;
		$this->date_enregistrement = $date_enregistrement;
    }

    public function all()
    {
    	$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('SELECT * FROM commande');
	    $req->execute();

	    foreach($req->fetchAll() as $commande) {
	    	$commandes[] = new Commande($commande['id'], $commande['id_membre'], $commande['id_produit'], $commande['date_enregistrement']);
	    }

	    return $commandes;
    }

    public function find($id)
    {
    	$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('SELECT * FROM commande WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $commande = $req->fetch();
	    $commande = new Commande($commande['id'], $commande['id_membre'], $commande['id_produit'], $commande['date_enregistrement']);

	    return $commande;
    }

    public function findAllByUser($id_membre)
    {
    	$db = new DB();
		$db = $db->connect();
    	$req = $db->prepare('SELECT * FROM commande WHERE id_membre = :id_membre');
	    $req->bindParam(':id_membre', $id_membre);
	    $req->execute();

	    foreach($req->fetchAll() as $commande) {
	    	$commandes[] = new Commande($commande['id'], $commande['id_membre'], $commande['id_produit'], $commande['date_enregistrement']);
	    }

	    return $commandes;
    }

    // @todo, do in controller : new Command($_POST)
    // and use $this here instead of $_POST
	public function create()
	{
		$db = new DB();
		$db = $db->connect();
		$sql = "INSERT INTO commande SET id_membre = :id_membre, id_produit = :id_produit, date_enregistrement = :date_enregistrement";
		$req = $db->prepare($sql);
		$req->execute(array(
			':id_membre' => $_POST['id_membre'],
			':id_produit' => $_POST['id_produit'],
			':date_enregistrement' => date('Y-m-d H:i:s')
		));

	    return true;
	}

	public function update($commandeId)
	{
		$db = new DB();
		$db = $db->connect();
		$sql = "UPDATE commande SET id_membre = :id_membre, id_produit = :id_produit WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->execute(array(
			':id_membre' => $_POST['id_membre'],
			':id_produit' => $_POST['id_produit'],
			':id' => $commandeId
		));

		return true;
	}

    public function delete($id)
    {
    	$db = new DB();
		$db = $db->connect();
    	$req = $db->prepare('DELETE FROM commande WHERE id = ?');
		$req->bindParam(':id', $id);
		$req->execute();

		if (find($id)) {
			echo "La suppression a échoué";
			return false;
		} else {
			echo "La commande a bien été supprimée";
			return true;
		}
    }
}

?>