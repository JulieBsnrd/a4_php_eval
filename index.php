<?php
session_start();

require 'config/config.php';
//require 'model/functions.fn.php';

//core logic

require 'views/templates/_header.php';
require 'views/accueil.php';
require 'views/templates/_footer.php';

?>
