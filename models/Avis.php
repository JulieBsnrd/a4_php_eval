<?php

require 'DB.php';

class Avis
{
	/** var int */
	protected $id;

	/** var int */
	protected $id_membre;

	/** var int */
	protected $id_salle;

	/** var string */
	protected $commentaire;

	/** var int */
	protected $note;

	/** var string */
	protected $date_enregistrement;


	public function __construct($id, $id_membre, $id_salle, $commentaire, $note, $date_enregistrement) 
	{
		$this->id = $id;
		$this->id_membre = $id_membre;
		$this->id_salle = $id_salle;
		$this->commentaire = $commentaire;
		$this->note = $note;
		$this->date_enregistrement = $date_enregistrement;
    }

    public function all()
    {
    	$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('SELECT * FROM avis');
	    $req->execute();

	    foreach($req->fetchAll() as $item) {
	    	$avis[] = new Avis($item['id'], $item['id_membre'], $item['id_salle'], $item['commentaire'], $item['note'], $item['date_enregistrement']);
	    }

	    return $avis;
    }

    public function find($id)
    {
    	$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('SELECT * FROM avis WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $item = $req->fetch();
	    $avis = new Avis($item['id'], $item['id_membre'], $item['id_salle'], $item['commentaire'], $item['note'], $item['date_enregistrement']);

	    return $avis;
    }

    public function findAllByUser($id_membre)
    {
    	$db = new DB();
		$db = $db->connect();
    	$req = $db->prepare('SELECT * FROM avis WHERE id_membre = :id_membre');
	    $req->bindParam(':id_membre', $id_membre);
	    $req->execute();

	    foreach($req->fetchAll() as $item) {
	    	$avis[] = new Avis($item['id'], $item['id_membre'], $item['id_salle'], $item['commentaire'], $item['note'], $item['date_enregistrement']);
	    }

	    return $avis;
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
    	$db = new DB();
		$db = $db->connect();
    	$req = $db->prepare('DELETE FROM avis WHERE id = ?');
		$req->bindParam(':id', $id);
		$req->execute();

		if (find($id)) {
			echo "La suppression a échoué";
			return false;
		} else {
			echo "L'avis a bien été supprimé";
			return true;
		}
    }
}

?>
