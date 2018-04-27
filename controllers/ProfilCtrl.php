<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 26/04/2018
 * Time: 14:43
 */
require '../models/functions.fn.php';
require '../models/Produit.php';
require '../models/Commande.php';
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:SignInCtrl.php");

$commandes = Commande::findAllByUser($_SESSION['membre']['id']);
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require '../views/profil.php';

?>