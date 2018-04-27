<?php
session_start();

require '../models/Produit.php';
require '../models/Commande.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
	if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "get"){
		$produit = Produit::find($_GET['id']);
		include '../views/produit.php';
	}
	elseif(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "buy"){
		//$produit = Produit::find($_GET['id']);
		$_POST['id_membre'] = $_SESSION['membre']['id'];
		$_POST['id_produit'] = $_GET['id'];
		$commande = Commande::create();
		$quote = ["class" => 'green', "content" => 'Vous êtes bien connecté.'];
        header('Location: BoutiqueCtrl.php');
	}
} else {
	$produits = Produit::all();
	include '../views/boutique.php';
}

?>