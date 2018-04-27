<?php
session_start();

require '../models/Produit.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$produit = Produit::find($_GET['id']);
	include '../views/produit.php';
} else {
	$produits = Produit::all();
	include '../views/boutique.php';
}

?>