<?php

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
		$req = $db->prepare('SELECT * FROM produit');
	    $req->execute();

	    foreach($req->fetchAll() as $produit) {
	    	$produits[] = new Produit($produit['id'], $produit['id_salle'], $produit['date_arrivee'], $produit['date_depart'], $produit['prix'], $produit['etat']);
	    }

	    return $produits;
	}

	public function find($id)
	{
		$req = $db->prepare('SELECT * FROM produit WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $produit = $req->fetch();
	    $produit = new Produit($produit['id'], $produit['id_salle'], $produit['date_arrivee'], $produit['date_depart'], $produit['prix'], $produit['etat']);

	    return $produit;
    }

    public function update($id)
	{

	}

	public function delete($id)
	{
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
