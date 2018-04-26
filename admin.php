<?php
session_start();

require 'config/config.php';
require 'models/functions.fn.php';
//require 'models/AdminModel.php';

require 'views/templates/_header.php';
require 'views/admin/index.php';
require 'views/templates/_footer.php';

?>