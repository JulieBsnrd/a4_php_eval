<?php

function getAll($db)
{
	$req = $db->prepare('SELECT * FROM salle');
    $req->execute();

    $salles = $req->fetchAll();

    return $salles;
}

function getOne($db, $salleId)
{
    $req = $db->prepare('SELECT * FROM salle WHERE id = ?');
    $req->execute(array($salleId));

    $salle = $req->fetch();

    return $salle;
}

function create($db)
{
	$sql = "INSERT INTO salle SET titre = :titre, description = :description, photo = :photo, pays = :pays, ville = :ville, cp = :cp, capacite = :capacite, categorie = :categorie";
	$req = $db->prepare($sql);
	$req->execute(array(
		':titre' => $_POST['titre'],
		':description' => $_POST['description'],
		':photo' => $_FILES['photo'],
		':pays' => $_POST['pays'],
		':ville' => $_POST['ville'],
		':cp' => $_POST['cp'],
		':capacite' => $_POST['capacite'],
		':categorie' => $_POST['categorie']
	));
    return true;
}

function update($db, $salleId)
{
	$sql = "UPDATE salle SET titre = :titre, description = :description, photo = :photo, pays = :pays, ville = :ville, cp = :cp, capacite = :capacite, categorie = :categorie WHERE id = :id";
	$sth = $db->prepare($sql);
	$sth->execute(array(
		':titre' => $_POST['titre'],
		':description' => $_POST['description'],
		':photo' => $_POST['photo'],
		':pays' => $_POST['pays'],
		':ville' => $_POST['ville'],
		':cp' => $_POST['cp'],
		':capacite' => $_POST['capacite'],
		':categorie' => $_POST['categorie'],
		':id' => $salleId
	));
	return true;
}

function delete($db, $salleId)
{
	$sth = $db->prepare("DELETE FROM salle WHERE id = :id");
	$sth->bindParam("id", $salleId);
	$sth->execute();
	return true;
}

?>