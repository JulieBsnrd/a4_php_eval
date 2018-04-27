<?php
session_start();

require '../../models/Salle.php';

if($_SESSION['membre']['statut'] != "1"){
    header("location:SignInCtrl.php");
}

if(!empty($_GET)){
	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$salle = Salle::delete($_GET['id']);
			header('Location: AdminSalleCtrl.php');
		}
	}
}

if(!empty($_POST)){
	if(isset($_POST['action']) && $_POST['action'] == "edit"){
		if(isset($_POST['id']) && !empty($_POST['id'])){
		    $salle = Salle::update($_POST['id']);
			header('Location: AdminSalleCtrl.php');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == "create"){
        $_POST['photo'] = "";
        if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){
            if($_FILES['photo']['size']<=10000000)
            {
                $ext = strtolower(substr(strrchr($_FILES['photo']['name'], '.'),1));
                if($ext=="jpg" || $ext=="png" || $ext=="gif")
                {
                    $_POST['photo'] = uniqid(true).".".$ext;
                    $path = '../../views/salles/photo/'.$_POST['photo'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], $path);
                }
            }
        }
        $salle = Salle::create();
        header('Location: AdminSalleCtrl.php');      
	}
}

if(isset($_GET['id']) && !empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] == "get"){
	$salle = Salle::find($_GET['id']);
	require '../../views/admin/editionSalle.php';
}
elseif(isset($_GET['path']) && $_GET['path'] == "create"){
	require '../../views/admin/ajoutSalle.php';
}
else{
	$salles = Salle::all();
	require '../../views/admin/gestionSalles.php';
}

?>