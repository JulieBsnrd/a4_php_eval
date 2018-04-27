<?php

require 'DB.php';

class Avis
{
	/** var int */
	public $id;

	/** var int */
	public $id_membre;

	/** var int */
	public $id_salle;

	/** var string */
	public $commentaire;

	/** var int */
	public $note;

	/** var string */
	public $date_enregistrement;


	public function __construct($id, $id_membre, $id_salle, $commentaire, $note, $date_enregistrement) 
	{
		$this->id = $id;
		$this->id_membre = $id_membre;
		$this->id_salle = $id_salle;
		$this->commentaire = $commentaire;
		$this->note = $note;
		$this->date_enregistrement = $date_enregistrement;
    }

    static public function all()
    {
    	$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM avis');
	    $req->execute();

	    $avis = [];

	    foreach($req->fetchAll() as $item) {
	    	$avis[] = new Avis($item['id'], $item['id_membre'], $item['id_salle'], $item['commentaire'], $item['note'], $item['date_enregistrement']);
	    }

	    return $avis;
    }

    static public function find($id)
    {
    	$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM avis WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $item = $req->fetch();
	    $avis = new Avis($item['id'], $item['id_membre'], $item['id_salle'], $item['commentaire'], $item['note'], $item['date_enregistrement']);

	    return $avis;
    }

    static public function findAllByUser($id_membre)
    {
    	$db = DB::getInstance();
    	$req = $db->prepare('SELECT * FROM avis WHERE id_membre = :id_membre');
	    $req->bindParam(':id_membre', $id_membre);
	    $req->execute();

	    foreach($req->fetchAll() as $item) {
	    	$avis[] = new Avis($item['id'], $item['id_membre'], $item['id_salle'], $item['commentaire'], $item['note'], $item['date_enregistrement']);
	    }

	    return $avis;
    }

	static public function create()
	{
		$db = DB::getInstance();
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

    static public function update($id)
    {
    	$db = DB::getInstance();
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

    static public function delete($id)
    {
    	$db = DB::getInstance();
    	$req = $db->prepare('DELETE FROM avis WHERE id = :id');
		$req->bindParam(':id', $id);
		$req->execute();

		if(Avis::find($id)) {
			echo "La suppression a échoué";
			return false;
		}else {
			echo "L'avis a bien été supprimé";
			return true;
		}
    }

    public static function getMembres(){
    	$db = DB::getInstance();
		$req = $db->prepare('SELECT id, pseudo, nom, prenom, email, civilite, statut, date_enregistrement FROM membre');
	    $req->execute();
	    return $req->fetchAll();
    }

    static public function getSalles(){
		$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM salle');
	    $req->execute();
	    return $req->fetchAll();
	}
}

?>
