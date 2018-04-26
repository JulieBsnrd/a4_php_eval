<?php
session_start();

require '../config/config.php';

require('../models/SallesModel.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
	$salle = getOne($db, $_GET['id']);
	
	require('../views/salles/salle.php');
} else {
    echo 'Erreur : aucun identifiant de salle envoyé';
}

?>
