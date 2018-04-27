<?php
session_start();

require '../config/config.php';
require '../models/functions.fn.php';
require '../models/MembresModel.php';

//core logic
if(!empty($_POST)){
	$error = validatorSignUp();

	if(!$error){
		$success = signUp($db);
		if($success){
			$quote = ["class" => 'green', "content" => 'Utilisateur ajouté avec succès'];
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