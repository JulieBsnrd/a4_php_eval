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