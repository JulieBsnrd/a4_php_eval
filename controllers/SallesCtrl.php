<?php
session_start();

require '../config/config.php';

require '../models/Salle.php';


$salle = Salle::all();

require('../views/salles/liste_salles.php');

?>