<?php
session_start();

require 'config/config.php';
require 'models/ProduitsModel.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$produit = getOne($db, $_GET['id']);
	require 'views/produit.php';
} else {
	$produits = getAll($db);
	require 'views/boutique.php';
}

?>