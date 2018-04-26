<?php
session_start();

require 'config/config.php';
require 'models/functions.fn.php';
require 'models/MembresManagerModel.php';

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			var_dump('expression');
			$membre = delete($db, $_GET['id']);
		}
	}
}
//Should throw away if not admin
$membres = getAll($db);
/*if(!empty($_POST)){
	$error = validator();

	if(!$error){
		$success = signIn($db);
		if($success){
			$quote = ["class" => 'green', "content" => 'Utilisateur ajouté avec succès'];
		}
	}
}*/

require 'views/templates/_header.php';
require 'views/admin/gestionMembres.php';
require 'views/templates/_footer.php';

?>