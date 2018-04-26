<?php

require 'DB.php';

class Produit 
{
	/** var int */
	protected $id;

	/** var int */
	protected $id_salle;

	/** var string */
	protected $date_arrivee;

	/** var string */
	protected $date_depart;

	/** var int */
	protected $prix;

	/** var string */
	protected $etat;


	public function __construct($id, $id_salle, $date_arrivee, $date_depart, $prix, $etat) 
	{
		$this->id = $id;
		$this->id_salle = $id_salle;
		$this->date_arrivee = $date_arrivee;
		$this->date_depart = $date_depart;
		$this->prix = $prix;
		$this->etat = $etat;
    }

    public function all()
    {
    	$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('SELECT * FROM produit');
	    $req->execute();

	    foreach($req->fetchAll() as $produit) {
	    	$produits[] = new Produit($produit['id'], $produit['id_salle'], $produit['date_arrivee'], $produit['date_depart'], $produit['prix'], $produit['etat']);
	    }

	    return $produits;
	}

	public function find($id)
	{
		$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('SELECT * FROM produit WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $produit = $req->fetch();
	    $produit = new Produit($produit['id'], $produit['id_salle'], $produit['date_arrivee'], $produit['date_depart'], $produit['prix'], $produit['etat']);

	    return $produit;
    }

    public function create()
	{
		$db = new DB();
		$db = $db->connect();
		$sql = "INSERT INTO produit SET id_salle = :id_salle, date_arrivee = :date_arrivee, date_depart = :date_depart, prix = :prix, etat = :etat";
		$req = $db->prepare($sql);
		$req->execute(array(
			':id_salle' => $_POST['id_salle'],
			':date_arrivee' => $_POST['date_arrivee'],
			':date_depart' => $_POST['date_depart'],
			':prix' => $_POST['prix'],
			':etat' => $_POST['etat']
		));

	    return true;
	}

    public function update($id)
	{
		$db = new DB();
		$db = $db->connect();
		$sql = "UPDATE produit SET id_salle = :id_salle, date_arrivee = :date_arrivee, date_depart = :date_depart, prix = :prix, etat = :etat WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->execute(array(
			':id_salle' => $_POST['id_salle'],
			':date_arrivee' => $_POST['date_arrivee'],
			':date_depart' => $_POST['date_depart'],
			':prix' => $_POST['prix'],
			':etat' => $_POST['etat'],
			':id' => $id
		));

		return true;
	}

	public function delete($id)
	{
		$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('DELETE FROM produit WHERE id = ?');
		$req->bindParam(':id', $id);
		$req->execute();

		if (find($id)) {
			echo "La suppression a échoué";
			return false;
		} else {
			echo "Le produit a bien été supprimé";
			return true;
		}
	}
}

?>
