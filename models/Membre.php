<?php 
require '../config/config.php';

class Membre 
{
	/** var int */
	protected $id;

	/** var string */
	protected $pseudo;

	/** var string */
	protected $mdp;

	/** var string */
	protected $nom;

	/** var string */
	protected $prenom;

	/** var string */
	protected $email;

	/** var string */
	protected $civilite;


	public function __construct($id, $pseudo, $mdp = null, $nom, $prenom, $email, $civilite)
	{
      $this->id = $id;
      $this->pseudo = $pseudo;
      $this->mdp = $mdp;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->email = $email;
      $this->civilite = $civilite;
    }

	public function all()
	{
		$req = $db->prepare('SELECT id, pseudo, nom, prenom, email, civilite, statut, date_enregistrement FROM membre');
	    $req->execute();

	    foreach($req->fetchAll() as $membre) {
	    	$membres[] = new Membre($membre['id'], $membre['pseudo'], null, $membre['nom'], $membre['prenom'], $membre['email'], $membre['civilite'], $membre['statut'], $membre['date_enregistrement']);
	    }

	    return $membres;
	}

	public function find($id)
	{
		$req = $db->prepare('SELECT id, pseudo, nom, prenom, email, civilite, statut, date_enregistrement FROM membre WHERE id = :id');
	    $req->bindParam(':id', $id);
	    $req->execute();

	    $membre = $req->fetch();
	    $membre = new Membre($membre['id'], $membre['pseudo'], null, $membre['nom'], $membre['prenom'], $membre['email'], $membre['civilite'], $membre['statut'], $membre['date_enregistrement']);

	    return $membre;
	}

	function update($id)
	{

	}

	function delete($id)
	{
		$req = $db->prepare('DELETE FROM membre WHERE id = ?');
		$req->bindParam(':id', $id);
		$req->execute();

		if (find($id)) {
			echo "La suppression a échoué";
			return false;
		} else {
			echo "L'utilisateur a bien été supprimé";
			return true;
		}
	}

	public function setAdmin($id)
	{
		/*$sql = "UPDATE membre SET statut=:statut WHERE id=:id";
		$sth = $db->prepare($sql);
		$sth->bindParam("id", $input['id']);
		$sth->bindParam("statut", $input['statut']);
		$sth->execute();*/
	}

	public function validatorSignUp()
	{
		if(empty($_POST['pseudo']))
			return 'Veuillez insérer un pseudo';

		elseif(strlen($_POST['pseudo']) > 20 || strlen($_POST['pseudo']) < 5)
	        return 'Votre pseudo doit être compris entre 5 et 20 caractères';
	    elseif(!preg_match('/^[a-z\d]{5,20}$/i', $_POST['pseudo']))
			return 'Pseudo invalide';

		elseif(empty($_POST['mdp']))
			return 'Veuillez rentrer un mot de passe';
		elseif(strlen($_POST['mdp']) < 8)
			return 'Votre mot de passe doit faire au minimum 8 caractères';

		elseif(empty($_POST['nom']))
			return 'Veuillez rentrer votre nom';
		elseif(strlen($_POST['nom']) > 20)
			return 'Votre nom ne doit pas dépasser 20 caractères';

		elseif(empty($_POST['prenom']))
			return 'Veuillez rentrer votre prénom';
		elseif(strlen($_POST['prenom']) > 20)
			return 'Votre prénom ne doit pas dépasser 20 caractères';

		elseif(empty($_POST['email']))
			return 'Veuillez rentrer votre adresse mail';
		elseif (strlen($_POST['email']) > 30)
			return 'Votre adresse mail ne doit pas dépasser 50 caractères';
		elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			return 'Adresse mail invalide';

		elseif(empty($_POST['civilite']))
			return 'Veuillez préciser votre Civilité';
		elseif(!in_array($_POST['civilite'], ['m','f']))
			return 'Civilité invalide';

		else return false;
	}

	public function validatorSignIn()
	{
	    if(empty($_POST['pseudo']))
	        return 'Veuillez insérer un pseudo';

	    elseif(strlen($_POST['pseudo']) > 20 || strlen($_POST['pseudo']) < 5)
	        return 'Votre pseudo doit être compris entre 5 et 20 caractères';
	    elseif(!preg_match('/^[a-z\d]{5,20}$/i', $_POST['pseudo']))
	        return 'Pseudo invalide';

	    elseif(empty($_POST['mdp']))
	        return 'Veuillez rentrer un mot de passe';
	    elseif(strlen($_POST['mdp']) < 8)
	        return 'Votre mot de passe doit faire au minimum 8 caractères';

	    else return false;
	}

	public function signUp()
	{
		$sql = "INSERT INTO membre SET pseudo = :pseudo, mdp = :mdp, nom = :nom, prenom = :prenom, email = :email, civilite = :civilite, date_enregistrement = :date_enregistrement";
		$req = $db->prepare($sql);
		$req->execute(array(
			':pseudo' => $_POST['pseudo'],
			':mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
			':nom' => $_POST['nom'],
			':prenom' => $_POST['prenom'],
			':email' => $_POST['email'],
			':civilite' => $_POST['civilite'],
			':date_enregistrement' => date('Y-m-d H:i:s')
		));
	    if ($result = $req->fetch()) {
	        return true;
	    } else {
	        return false;
	    }
	}

	public function signIn()
	{
	    $sql = "SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp";
	    $req = $db->prepare($sql);
	    $req->execute(array(
	        ':pseudo' => $_POST['pseudo'],
	        ':mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT)
	    ));
	    if ($result = $req->fetch()) {
	        return true;
	    } else {
	        return false;
	    }
	}
}

?>
