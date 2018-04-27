<?php
session_start();

require '../config/config.php';

require('../models/SallesModel.php');

//Handle image from files
/*if(isset($_FILES['avatar'])&&$_FILES['avatar']['error']==0)
{
	if($_FILES['avatar']['size']<=120000)
	{
		$ext = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
		if($ext=="jpg" || $ext=="png" || $ext=="gif")
		{
			$tailleimage = getimagesize($_FILES['avatar']['tmp_name']);
			if($tailleimage[0] < 150 && $tailleimage[1] < 150){
				move_uploaded_file($_FILES['avatar']['tmp_name'],$_FILES['avatar']['name']);
				$image = $_FILES['avatar']['name'];
			}
		}
	}
}*/

if (isset($_GET['id']) && $_GET['id'] > 0) {
	$salle = getOne($db, $_GET['id']);
	
	require('../views/salles/salle.php');
} else {
    echo 'Erreur : aucun identifiant de salle envoyé';
}

?>
