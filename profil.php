<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 26/04/2018
 * Time: 14:43
 */
require '../models/functions.fn.php';

//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:connexion.php");
debug($_SESSION);


//--------------------------------- AFFICHAGE HTML ---------------------------------//
require 'views/templates/_header.php';
require 'views/profil.php';
require 'views/templates/_footer.php';

