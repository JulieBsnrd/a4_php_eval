<?php
session_start();

require 'config/config.php';
require 'models/MembresManagerModel.php';

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$membre = delete($db, $_GET['id']);
		}
	}
}

if(!empty($_POST))

//Should throw away if not admin
$membres = getAll($db);

require 'views/templates/_header.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
	$membre = get($db, $_GET['id']);
	require 'views/admin/gestionMembre.php';
}
else{
	require 'views/admin/gestionMembres.php';
}
require 'views/templates/_footer.php';

?>