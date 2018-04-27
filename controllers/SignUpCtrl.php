<?php
session_start();

require '../models/functions.fn.php';
require '../models/Membre.php';

//core logic
if(!empty($_POST)){
	$error = Membre::validatorSignUp();

	if(!$error){
		$success = Membre::signUp();
		if($success){
			$quote = ["class" => 'green', "content" => 'Utilisateur ajouté avec succès'];
			header('Location: SignInCtrl.php');
		}
	}
	/*if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
		if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username'])) {
			if($mailChecker === false) {
				$error = 'Entrer une adresse mail valide';
			}
			else{
				//la fonction userConnection renvoie true ou false
				//true ->  connexion = OK
				//false -> connexion = FAIL
				$connect = userRegistration($db, $_POST['username'], $_POST['email'], $_POST['password']);
				if($connect == true){
					header('Location: IndexCtrl.php');
				}
				else{
					$error = 'Le couple email / mot de passe est incorrect';
				}
			}
		}
	}*/
}

include '../views/signUp.php';

?>