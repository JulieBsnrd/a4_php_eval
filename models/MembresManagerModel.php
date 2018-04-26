<?php

function getAll($db){
	$sth = $db->prepare("SELECT id, pseudo, nom, prenom, email, civilite, statut, date_enregistrement FROM membre");
	$sth->execute();
	$membres = $sth->fetchAll();
	return $membres;
}

function get($db, $id){
	$sth = $db->prepare("SELECT id, pseudo, nom, prenom, email, civilite, statut, date_enregistrement FROM membre WHERE id = :id");
	$sth->bindParam("id", $id);
	$sth->execute();
	$membre = $sth->fetch();
	return $membre;
}

function update($db, $id){
	$sql = "INSERT INTO membre SET pseudo = :pseudo, mdp = :mdp, nom = :nom, prenom = :prenom, email = :email, civilite = :civilite, statut = :statut";
	$sth = $db->prepare($sql);
	$sth->execute(array(
		':pseudo' => $_POST['pseudo'],
		':mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
		':nom' => $_POST['nom'],
		':prenom' => $_POST['prenom'],
		':email' => $_POST['email'],
		':civilite' => $_POST['civilite'],
		':statut' => $_POST['statut']
	));
	return true;
}

function delete($db, $id){
	$sth = $db->prepare("DELETE FROM membre WHERE id = :id");
	$sth->bindParam("id", $id);
	$sth->execute();
	return true;
}

function setAdmin($db, $id){
	/*$sql = "UPDATE membre SET statut=:statut WHERE id=:id";
	$sth = $db->prepare($sql);
	$sth->bindParam("id", $_POST['id']);
	$sth->bindParam("statut", $_POST['statut']);
	$sth->execute();*/
}

?>