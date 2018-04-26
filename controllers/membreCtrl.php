<?php 
session_start();

//Create membre
if(!empty($_POST)){
	$error = validator();

	if(!$error){
		$success = signIn($db);
		if($success){
			$quote = ["class" => 'green', "content" => 'Utilisateur ajouté avec succès'];
		}
	}
}

?>