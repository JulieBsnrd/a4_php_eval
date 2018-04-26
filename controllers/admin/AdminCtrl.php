<?php
session_start();

require 'config/config.php';
require 'models/MembresManagerModel.php';

require 'views/templates/_header.php';
require 'views/admin/index.php';
require 'views/templates/_footer.php';
?>