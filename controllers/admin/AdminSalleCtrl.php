<?php
session_start();

require 'config/config.php';
require 'models/Salle.php';

if($_SESSION['membre']['statut'] != "1"){
    header("location:SignInCtrl.php");
}

if(!empty($_GET)){
    if(isset($_GET['action']) && $_GET['action'] == "delete"){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $salle = Salle::delete($_GET['id']);
            header('Location: AdminSalleCtrl.php');
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
            $salle = Salle::update($_POST['id']);
            header('Location: AdminSallesCtrl.php');
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
        $salle = Salle::create();
        //Handle image from files
        if(isset($_FILES['photo']) && $_FILES['photo']['error']==0)
        {

            header('Location: profil.php');

        }
        else{
            header('Location: signIn.php');


        }
    }
}



if (isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get") {
    $salle = Salle::find($_GET['id']);
    include '../../views/admin/editionSalle.php';
} elseif (isset($_GET['path']) && $_GET['path'] == "create") {
    include '../../views/admin/ajoutSalle.php';
} else {
    $produits = Salle::all();
    include '../../views/admin/gestionSalles.php';
}

?>