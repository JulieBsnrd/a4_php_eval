<?php 

require 'DB.php';

class Salle
{
	/** var int */
	protected $id;

	/** var string */
	protected $titre;

	/** var string */
	protected $description;

	/** var string */
	protected $pays;

	/** var string */
	protected $ville;

	/** var string */
	protected $cp;

	/** var int */
	protected $capacite;

	/** var string */
	protected $categorie;

	/** var string */
	protected $photo;


	public function __construct($id, $titre, $description, $pays, $ville, $cp, $capacite, $categorie, $photo)
	{
	    $this->id = $id;
	    $this->titre = $titre;
	    $this->description = $description;
	    $this->pays = $pays;
	    $this->ville = $ville;
	    $this->cp = $cp;
	    $this->capacite = $capacite;
	    $this->categorie = $categorie;
	    $this->photo = $photo;
    }

	public static function all()
	{
		$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('SELECT * FROM salle');
	    $req->execute();

	    foreach($req->fetchAll() as $salle) {
	    	$salles[] = new Salle($salle['id'], $salle['titre'], $salle['description'], $salle['pays'], $salle['ville'], $salle['cp'], $salle['capacite'], $salle['categorie'], $salle['photo']);
	    }

	    return $salles;
	}

	public function find($id)
	{
		$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('SELECT * FROM salle WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $salle = $req->fetch();
	    $salle = new Salle($salle['id'], $salle['titre'], $salle['description'], $salle['pays'], $salle['ville'], $salle['cp'], $salle['capacite'], $salle['categorie'], $salle['photo']);

	    return $salle;
	}

	public function create()
	{
		$db = new DB();
		$db = $db->connect();
		$sql = "INSERT INTO salle SET titre = :titre, description = :description, photo = :photo, pays = :pays, ville = :ville, cp = :cp, capacite = :capacite, categorie = :categorie";
		$req = $db->prepare($sql);
		$req->execute(array(
			':titre' => $_POST['titre'],
			':description' => $_POST['description'],
			':photo' => $_POST['photo'],
			':pays' => $_POST['pays'],
			':ville' => $_POST['ville'],
			':cp' => $_POST['cp'],
			':capacite' => $_POST['capacite'],
			':categorie' => $_POST['categorie']
		));

	    return true;
	}

	public function update($id)
	{
		$db = new DB();
		$db = $db->connect();
		$sql = "UPDATE salle SET titre = :titre, description = :description, photo = :photo, pays = :pays, ville = :ville, cp = :cp, capacite = :capacite, categorie = :categorie WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->execute(array(
			':titre' => $_POST['titre'],
			':description' => $_POST['description'],
			':photo' => $_POST['photo'],
			':pays' => $_POST['pays'],
			':ville' => $_POST['ville'],
			':cp' => $_POST['cp'],
			':capacite' => $_POST['capacite'],
			':categorie' => $_POST['categorie'],
			':id' => $id
		));

		return true;
	}

	public function delete($id)
	{
		$db = new DB();
		$db = $db->connect();
		$req = $db->prepare('DELETE FROM salle WHERE id = ?');
		$req->bindParam(':id', $id);
		$req->execute();

		if (find($id)) {
			echo "La suppression a échoué";
			return false;
		} else {
			echo "La salle a bien été supprimée";
			return true;
		}
	}
}

?>
