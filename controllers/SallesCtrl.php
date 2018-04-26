<?php
session_start();

require '../config/config.php';

require('../models/SallesModel.php');

$salles = getAll($db);

require('../views/salles/liste_salles.php');

?>