<?php
session_start();

require 'config/config.php';
require 'models/ProduitsModel.php';

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$produit = delete($db, $_GET['id']);
			header('Location: AdminProduits.php');
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
			$produit = update($db, $_POST['id']);
			header('Location: AdminProduits.php');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == "create"){
		$dateDepart = DateTime::createFromFormat('M d, Y', $_POST['date_depart']);
		$dateArrivee = DateTime::createFromFormat('M d, Y', $_POST['date_arrivee']);
		$_POST['date_depart'] = $dateDepart->format('Y-m-d H:i:s');
		$_POST['date_arrivee'] = $dateArrivee->format('Y-m-d H:i:s');
		$produit = create($db);
		header('Location: AdminProduits.php');
	}
}

require 'views/templates/_header.php';
if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get"){
	$produit = getOne($db, $_GET['id']);
	require 'views/admin/editionProduit.php';
}
elseif(isset($_GET['path']) && $_GET['path'] == "create"){
	require 'views/admin/ajoutProduit.php';
}
else{
	$produits = getAll($db);
	require 'views/admin/gestionProduits.php';
}
require 'views/templates/_footer.php';
?>