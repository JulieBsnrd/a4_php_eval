<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 26/04/2018
 * Time: 14:43
 */
require '../models/functions.fn.php';

//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:SignInCtrl.php");
//debug($_SESSION);

//--------------------------------- AFFICHAGE HTML ---------------------------------//
require '../views/profil.php';

?>