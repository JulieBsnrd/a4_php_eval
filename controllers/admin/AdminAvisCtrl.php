<?php
session_start();

require '../../models/Avis.php';
require '../../models/Membre.php';
require '../../models/Salle.php';

if($_SESSION['membre']['statut'] != "1"){
	header("location: SignInCtrl.php");
}

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$avis = Avis::delete($_GET['id']);
			header('Location: AdminAvisCtrl.php');
		}
	}
}

if(!empty($_POST)){
	if(isset($_POST['action']) && $_POST['action'] == "edit"){
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$avis = Avis::update($_POST['id']);
			header('Location: AdminAvisCtrl.php');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == "create"){
		$avis = Avis::create();
		header('Location: AdminAvisCtrl.php');
	}
}

//TODO add validator for each input
//Should throw away if not admin

if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get"){
	$avis = Avis::find($_GET['id']);
	$membres = Membre::all();
	$salles = Salle::all();
	require '../../views/admin/editionAvis.php';
}
elseif(isset($_GET['path']) && $_GET['path'] == "create"){
	$membres = Membre::all();
	$salles = Salle::all();
	require '../../views/admin/ajoutAvis.php';
}
else{
	$avis = Avis::all();
	$membres = Membre::all();
	$salles = Salle::all();
	require '../../views/admin/gestionAvis.php';
}

?>