<?php
session_start();

require '../../models/Commande.php';

if($_SESSION['membre']['statut'] != "1"){
    header("location:SignInCtrl.php");
}

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$commande = Commande::delete($_GET['id']);
			header('Location: AdminCommandeCtrl.php');
		}
	}
}

if(!empty($_POST)){
	if(isset($_POST['action']) && $_POST['action'] == "edit"){
		if(isset($_POST['id']) && !empty($_POST['id'])){
		    $commande = Commande::update($_POST['id']);
			header('Location: AdminCommandeCtrl.php');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == "create"){
        $commande = Commande::create();
        header('Location: AdminCommandeCtrl.php');      
	}
}

if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get"){
	$commande = Commande::find($_GET['id']);
	$membres = Commande::getMembres();
	$produits = Commande::getProduits();
	require '../../views/admin/editionCommande.php';
}
elseif(isset($_GET['path']) && $_GET['path'] == "create"){
	$membres = Commande::getMembres();
	$produits = Commande::getProduits();
	require '../../views/admin/ajoutCommande.php';
}
else{
	$commandes = Commande::all();
	$membres = Commande::getMembres();
	$produits = Commande::getProduits();
	require '../../views/admin/gestionCommandes.php';
}

?>