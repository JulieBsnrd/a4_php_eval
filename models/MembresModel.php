<?php


function validatorSignUp(){
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

function validatorSignIn(){
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

function signUp($db){
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
    return true;
}

function signIn($db){
    $sql = "SELECT * FROM membre WHERE pseudo = :pseudo";
    $req = $db->prepare($sql);
    $req->execute(array(
        ':pseudo' => $_POST['pseudo']
    ));
    if ($result = $req->fetch(PDO::FETCH_ASSOC)) {
    	//azerty 123456789
        if(password_verify($_POST['mdp'], $result['mdp']))
        {
            foreach ($result as $key => $value) {
                if ( $key != 'mdp' ) {
                    $_SESSION['membre'][$key] = $value;
                }
            }

            header("location:views/profil.php");
            // Enregistrement dans la session PHP de l'utilisateur
            //Session::set('user', $user_data);
            return true;
        }
        else
        {
            return false;
        }
    } else {
        return false;
    }

}


?>