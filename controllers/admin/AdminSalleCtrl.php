<?php
session_start();

require 'config/config.php';
require 'models/SallesModel.php';

if($_SESSION['membre']['statut'] != "1"){
	header("location:signIn.php");
}

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$salle = delete($db, $_GET['id']);
			header('Location: AdminSalles.php');
		}
	}
}

if(!empty($_POST)){
	if(isset($_POST['action']) && $_POST['action'] == "edit"){
		if(isset($_POST['id']) && !empty($_POST['id'])){
		    $titre = $_POST['titre'];
            $description = $_POST['description'];
            $pays = $_POST['pays'];
            $ville = $_POST['ville'];
            $adresse = $_POST['adresse'];
            $cp = $_POST['cp'];
            $capacite = $_POST['capacite'];
            $categorie = $_POST['categorie'];
            $salle = update($db, $_POST['id']);
			header('Location: AdminSalles.php');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == "create"){
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $pays = $_POST['pays'];
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $capacite = $_POST['capacite'];
        $categorie = $_POST['categorie'];
        $salle = create($db);
        header('Location: AdminSalles.php');
	}
}

if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get"){
	$salle = getOne($db, $_GET['id']);
	require 'views/admin/editionSalle.php';
}
elseif(isset($_GET['path']) && $_GET['path'] == "create"){
	require 'views/admin/ajoutSalle.php';
}
else{
	$salles = getAll($db);
	require 'views/admin/gestionSalles.php';
}
?>