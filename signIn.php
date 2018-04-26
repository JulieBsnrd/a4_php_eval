<?php
session_start();

require 'config/config.php';
require 'models/functions.fn.php';
require 'models/MembresModel.php';
require 'controllers/membreCtrl.php';

require 'views/templates/_header.php';
require 'views/signIn.php';
require 'views/templates/_footer.php';

?>