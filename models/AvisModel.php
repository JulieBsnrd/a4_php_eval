<?php

//TODO utiliser les jointures
function getAll($db)
{
	$req = $db->prepare('SELECT * FROM avis');
    $req->execute();

    $avis = $req->fetchAll();

    return $avis;
}

function getOne($db, $avisId)
{
    $req = $db->prepare('SELECT * FROM avis WHERE id = ?');
    $req->execute(array($avisId));

    $avis = $req->fetch();

    return $avis;
}

function create()
{
	$sql = "INSERT INTO avis SET id_membre = :id_membre, id_salle = :id_salle, commentaire = :commentaire, note = :note, date_enregistrement = :date_enregistrement";
	$req = $db->prepare($sql);
	$req->execute(array(
		':id_membre' => $_POST['id_membre'],
		':id_salle' => $_POST['id_salle'],
		':commentaire' => $_POST['commentaire'],
		':note' => $_POST['note'],
		':date_enregistrement' => date('Y-m-d H:i:s')
	));
    return true;
}

function update($db, $avisId)
{
	$sql = "UPDATE avis SET id_membre = :id_membre, id_salle = :id_salle, commentaire = :commentaire, note = :note WHERE id = :id";
	$sth = $db->prepare($sql);
	$sth->execute(array(
		':id_membre' => $_POST['id_membre'],
		':id_salle' => $_POST['id_salle'],
		':commentaire' => $_POST['commentaire'],
		':note' => $_POST['note'],
		':id' => $avisId
	));
	return true;
}

function delete($db, $avisId)
{
	$sth = $db->prepare("DELETE FROM avis WHERE id = :id");
	$sth->bindParam("id", $avisId);
	$sth->execute();
	return true;
}

?>