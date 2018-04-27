<?php
session_start();

require 'models/Membre.php';

if($_SESSION['membre']['statut'] != "1"){
	header("location:signIn.php");
}

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$membre = Membre::delete($_GET['id']);
			header('Location: AdminMembres.php');
		}
	}
}

if(!empty($_POST)){
	if(isset($_POST['action']) && $_POST['action'] == "edit"){
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$membre = Membre::update($_POST['id']);
			header('Location: AdminMembres.php');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == "create"){
		$membre = Membre::create();
		header('Location: AdminMembres.php');
	}
}

//TODO add validator for each input
//Should throw away if not admin

if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get"){
	$membre = Membre::find($_GET['id']);
	require 'views/admin/editionMembre.php';
}
elseif(isset($_GET['path']) && $_GET['path'] == "create"){
	require 'views/admin/ajoutMembre.php';
}
else{
	$membres = Membre::all();
	require 'views/admin/gestionMembres.php';
}

?>