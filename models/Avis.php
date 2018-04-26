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

	public function create()
	{
		$db = new DB();
		$db = $db->connect();
		$sql = "INSERT INTO avis SET id_membre = :id_membre, id_salle = :id_salle, commentaire = :commentaire, note = :note, date_enregistrement = :date_enregistrement";
		$req = $db->prepare($sql);
		$req->execute(array(
			':id_membre' => $_POST['id_membre'],
			':id_salle' => $_POST['id_salle'],
			':commentaire' => $_POST['commentaire'],
			':note' => $_POST['note'],
			':date_enregistrement' => date('Y-m-d H:i:s')
		));

	    return true;
	}

    public function update($id)
    {
    	$db = new DB();
		$db = $db->connect();
		$sql = "UPDATE avis SET id_membre = :id_membre, id_salle = :id_salle, commentaire = :commentaire, note = :note WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->execute(array(
			':id_membre' => $_POST['id_membre'],
			':id_salle' => $_POST['id_salle'],
			':commentaire' => $_POST['commentaire'],
			':note' => $_POST['note'],
			':id' => $id
		));

		return true;
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
