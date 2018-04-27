<?php
session_start();

require '../../models/Produit.php';

if($_SESSION['membre']['statut'] != "1"){
	header("location:SignInCtrl.php");
}

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$produit = Produit::delete($_GET['id']);
			header('Location: AdminProduitCtrl.php');
		}
	}
}

if(!empty($_POST)){
	if(isset($_POST['action']) && $_POST['action'] == "edit"){
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$dateDepart = DateTime::createFromFormat('M d, Y', $_POST['date_depart']);
			$dateArrivee = DateTime::createFromFormat('M d, Y', $_POST['date_arrivee']);
			$_POST['date_depart'] = $dateDepart->format('Y-m-d H:i:s');
			$_POST['date_arrivee'] = $dateArrivee->format('Y-m-d H:i:s');
			$produit = Produit::update($_POST['id']);
			header('Location: AdminProduitCtrl.php');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == "create"){
		$dateDepart = DateTime::createFromFormat('M d, Y', $_POST['date_depart']);
		$dateArrivee = DateTime::createFromFormat('M d, Y', $_POST['date_arrivee']);
		$_POST['date_depart'] = $dateDepart->format('Y-m-d H:i:s');
		$_POST['date_arrivee'] = $dateArrivee->format('Y-m-d H:i:s');
		$produit = Produit::create();
		header('Location: AdminProduitCtrl.php');
	}
}

if (isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get") {
	$produit = Produit::find($_GET['id']);
	$salles = Produit::getSalles();
	include '../../views/admin/editionProduit.php';
} elseif (isset($_GET['path']) && $_GET['path'] == "create"){
	$salles = Produit::getSalles();
	include '../../views/admin/ajoutProduit.php';
} else {
	$produits = Produit::all();
	include '../../views/admin/gestionProduits.php';
}

?>