<!DOCTYPE html>
<html>
<head>
	<title>Lokisalle</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="views/css/style.css">
    <link rel="stylesheet" type="text/css" href="views/css/lokisalle.min.css">
</head>
<body>
	<header>
        <ul id="membreDropdown" class="dropdown-content">
            <li><a href='javascript:void(0);'>Profil</a></li>
            <li><a href='javascript:void(0);'>Panier</a></li>
            <li><a href='javascript:void(0);'>Admin</a></li>
            <li class="divider"></li>
            <li><a href='javascript:void(0);'>Me déconnecter</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper grey darken-3">
                <a href='javascript:void(0);' class="brand-logo">Accueil</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href='javascript:void(0);'>Inscription</a></li>
                    <li><a href='javascript:void(0);'>Connexion</a></li>
                    <li><a>Boutique</a></li>
                    <li><a href='javascript:void(0);' class="dropdown-trigger" data-target="membreDropdown"><i class="left material-icons">perm_identity</i></a></li>
                </ul>
            </div>
        </nav>
    </header>