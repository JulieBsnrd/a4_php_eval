<?php
session_start();

require 'config/config.php';
require 'models/functions.fn.php';
require 'models/MembresManagerModel.php';
require 'controllers/admin/AdminMembreCtrl.php';

require 'views/templates/_header.php';
require 'views/admin/gestionMembres.php';
require 'views/templates/_footer.php';

?>