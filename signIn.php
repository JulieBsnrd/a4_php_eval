<?php
session_start();

require 'config/config.php';
require 'models/functions.fn.php';
require 'models/MembresModel.php';

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

require 'views/templates/_header.php';
require 'views/signIn.php';
require 'views/templates/_footer.php';

?>