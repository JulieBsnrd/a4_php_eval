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
	$membre = $sth->fetchAll();
	return $membre;
}

function update($db, $id){

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
	$sth->bindParam("id", $input['id']);
	$sth->bindParam("statut", $input['statut']);
	$sth->execute();*/
}

?>