<?php

require 'DB.php';

class Produit 
{
	/** var int */
	public $id;

	/** var int */
	public $id_salle;

	/** var string */
	public $date_arrivee;

	/** var string */
	public $date_depart;

	/** var int */
	public $prix;

	/** var string */
	public $etat;


	public function __construct($id, $id_salle, $date_arrivee, $date_depart, $prix, $etat) 
	{
		$dateDepart = DateTime::createFromFormat('Y-m-d H:i:s', $date_depart);
		$dateArrivee = DateTime::createFromFormat('Y-m-d H:i:s', $date_arrivee);
		$this->id = $id;
		$this->id_salle = $id_salle;
		if(!empty($dateDepart) && !empty($dateArrivee)){
			$this->date_arrivee = $dateArrivee->format('M d, Y');
			$this->date_depart = $dateDepart->format('M d, Y');
		}
		$this->prix = $prix;
		$this->etat = $etat;
    }

    static public function all()
    {
    	$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM produit');
	    $req->execute();

	    foreach($req->fetchAll() as $produit) {
	    	$produits[] = new Produit($produit['id'], $produit['id_salle'], $produit['date_arrivee'], $produit['date_depart'], $produit['prix'], $produit['etat']);
	    }

	    return $produits;
	}

	static public function find($id)
	{
		$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM produit WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $produit = $req->fetch();
	    $produit = new Produit($produit['id'], $produit['id_salle'], $produit['date_arrivee'], $produit['date_depart'], $produit['prix'], $produit['etat']);

	    return $produit;
    }

    static public function create()
	{
		$db = DB::getInstance();
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

    static public function update($id)
	{
		$db = DB::getInstance();
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

	static public function delete($id)
	{
		$db = DB::getInstance();
		$req = $db->prepare('DELETE FROM produit WHERE id = :id');
		$req->bindParam(':id', $id);
		$req->execute();

		if(Produit::find($id)) {
			echo "La suppression a échoué";
			return false;
		}else {
			echo "Le produit a bien été supprimé";
			return true;
		}
	}
}

?>
