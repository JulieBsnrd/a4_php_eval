<?php 
session_start();

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$membre = delete($db, $_GET['id']);
		}
	}
}
//Should throw away if not admin
$membres = getAll($db);

?>