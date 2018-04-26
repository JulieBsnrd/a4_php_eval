<?php
session_start();

require 'config/config.php';
require 'models/MembresManagerModel.php';

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$membre = delete($db, $_GET['id']);
			header('Location: AdminMembres.php');
		}
	}
}

if(!empty($_POST)){
	if(isset($_POST['action']) && $_POST['action'] == "edit"){
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$membre = update($db, $_POST['id']);
			header('Location: AdminMembres.php');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == "create"){
		$membre = create($db);
		header('Location: AdminMembres.php');
	}
}

//TODO add validator for each input
//Should throw away if not admin

require 'views/templates/_header.php';
if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get"){
	$membre = get($db, $_GET['id']);
	require 'views/admin/editionMembre.php';
}
elseif(isset($_GET['path']) && $_GET['path'] == "create"){
	require 'views/admin/ajoutMembre.php';
}
else{
	$membres = getAll($db);
	require 'views/admin/gestionMembres.php';
}
require 'views/templates/_footer.php';

?>