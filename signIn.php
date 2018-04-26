<?php
session_start();

require 'config/config.php';
require 'models/functions.fn.php';
require 'models/MembresModel.php';
//core logic
if(!empty($_POST)){
	$error = validator();

	if(!$error){
		$success = signIn($db);
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
					header('Location: index.php');
				}
				else{
					$error = 'Le couple email / mot de passe est incorrect';
				}
			}
		}
	}*/
}

require 'views/templates/_header.php';
require 'views/signIn.php';
require 'views/templates/_footer.php';

?>