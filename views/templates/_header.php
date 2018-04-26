<!DOCTYPE html>
<html>
<head>
	<title>Lokisalle</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="views/css/style.css">
    <!--<link rel="stylesheet" type="text/css" href="views/css/lokisalle.min.css">-->
</head>
<body>
	<header>
        <ul id="membreDropdown" class="dropdown-content">
            <li><a href='profil.php'>Profil</a></li>
            <?php if(isset($_SESSION['membre']['statut']) && $_SESSION['membre']['statut'] == "1"): ?>
            	<li><a href='adminMembres.php'>Admin</a></li>
        	<?php endif; ?>
            <li class="divider"></li>
            <li><a href='javascript:void(0);'>Me déconnecter</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper grey darken-3">
                <a href='index.php' class="brand-logo">Lokisalle</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href='signUp.php'>Inscription</a></li>
                    <li><a href='signIn.php'>Connexion</a></li>
                    <li><a href="boutique.php">Boutique</a></li>
                    <?php if(isset($_SESSION['membre'])): ?>
                    	<li><a href='javascript:void(0);' class="dropdown-trigger" data-target="membreDropdown"><i class="left material-icons">perm_identity</i><?= $_SESSION['membre']['pseudo'] ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
	    <div class="row">
			<?php
			if(isset($error) && $error){
				echo '<div class="col s12 red lighten-1">';
				echo '<p class="center-align">'.$error.'</p>';
				echo '</div>';
			}
			if(isset($quote)){
				echo '<div class="col s12 '.$quote['class'].'">';
				echo '<p class="center-align">'.$quote['content'].'</p>';
				echo '</div>';
			}
			?>
		</div>

