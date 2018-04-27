<?php 

require_once 'DB.php';

class Salle
{
	/** var int */
	public $id;

	/** var string */
	public $titre;

	/** var string */
	public $description;

	/** var string */
	public $pays;

	/** var string */
	public $ville;

	/** var string */
	public $cp;

	/** var int */
	public $capacite;

	/** var string */
	public $categorie;

	/** var string */
	public $photo;

	/** var string */
	public $adresse;


	public function __construct($id, $titre, $description, $pays, $ville, $cp, $capacite, $categorie, $photo, $adresse)
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
	    $this->adresse = $adresse;
    }

	public static function all()
	{
		$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM salle');
	    $req->execute();

	    $salles = [];

	    foreach($req->fetchAll() as $salle) {
	    	$salles[] = new Salle($salle['id'], $salle['titre'], $salle['description'], $salle['pays'], $salle['ville'], $salle['cp'], $salle['capacite'], $salle['categorie'], $salle['photo'], $salle['adresse']);
	    }

	    return $salles;
	}

	public static function find($id)
	{
		$db = DB::getInstance();
		$req = $db->prepare('SELECT * FROM salle WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $salle = $req->fetch();
	    $salle = new Salle($salle['id'], $salle['titre'], $salle['description'], $salle['pays'], $salle['ville'], $salle['cp'], $salle['capacite'], $salle['categorie'], $salle['photo'], $salle['adresse']);

	    return $salle;
	}

	public static function create()
	{
		$db = DB::getInstance();
		$sql = "INSERT INTO salle SET titre = :titre, description = :description, photo = :photo, pays = :pays, ville = :ville, cp = :cp, capacite = :capacite, categorie = :categorie, adresse = :adresse";
		$req = $db->prepare($sql);
		$req->execute(array(
			':titre' => $_POST['titre'],
			':description' => $_POST['description'],
			':photo' => $_POST['photo'],
			':pays' => $_POST['pays'],
			':ville' => $_POST['ville'],
			':cp' => $_POST['cp'],
			':capacite' => $_POST['capacite'],
			':categorie' => $_POST['categorie'],
			':adresse' => $_POST['adresse']
		));

	    return true;
	}

	public static function update($id)
	{
		$db = DB::getInstance();
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

	public static function delete($id)
	{
		$db = DB::getInstance();
		$req = $db->prepare('DELETE FROM salle WHERE id = :id');
		$req->bindParam(':id', $id);
		$req->execute();

		if (Salle::find($id)) {
			echo "La suppression a échoué";
			return false;
		} else {
			echo "La salle a bien été supprimée";
			return true;
		}
	}
}

?>
