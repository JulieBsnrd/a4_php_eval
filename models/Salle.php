<?php 
require '../config/config.php';

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

	public function all()
	{
		$req = $db->prepare('SELECT * FROM salle');
	    $req->execute();

	    foreach($req->fetchAll() as $salle) {
	    	$salles[] = new Salle($salle['id'], $salle['titre'], $salle['description'], $salle['pays'], $salle['ville'], $salle['cp'], $salle['capacite'], $salle['categorie'], $salle['photo']);
	    }

	    return $salles;
	}

	public function find($id)
	{
		$req = $db->prepare('SELECT * FROM salle WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $salle = $req->fetch();
	    $salle = new Salle($salle['id'], $salle['titre'], $salle['description'], $salle['pays'], $salle['ville'], $salle['cp'], $salle['capacite'], $salle['categorie'], $salle['photo']);

	    return $salle;
	}

	public function update($id)
	{

	}

	public function delete($id)
	{
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
