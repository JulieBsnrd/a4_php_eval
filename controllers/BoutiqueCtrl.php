<?php
session_start();

require '../config/config.php';
require '../models/ProduitsModel.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$produit = getOne($db, $_GET['id']);
	include '../views/produit.php';
} else {
	$produits = getAll($db);
	include '../views/boutique.php';
}

?>