<?php

//TODO utiliser les jointures
function getAll($db)
{
	$req = $db->prepare('SELECT * FROM produit');
    $req->execute();

    $produits = $req->fetchAll();

    return $produits;
}

function getOne($db, $produitId)
{
    $req = $db->prepare('SELECT * FROM produit WHERE id = ?');
    $req->execute(array($produitId));

    $produit = $req->fetch();

    return $produit;
}

function create($db)
{
	$sql = "INSERT INTO produit SET id_salle = :id_salle, date_arrivee = :date_arrivee, date_depart = :date_depart, prix = :prix, etat = :etat";
	$req = $db->prepare($sql);
	$req->execute(array(
		':id_salle' => $_POST['id_salle'],
		':date_arrivee' => $_POST['date_arrivee'],
		':date_depart' => $_POST['date_depart'],
		':prix' => $_POST['prix'],
		':etat' => $_POST['etat']
	));
    return true;
}

function update($db, $produitId)
{
	$sql = "UPDATE produit SET id_salle = :id_salle, date_arrivee = :date_arrivee, date_depart = :date_depart, prix = :prix, etat = :etat WHERE id = :id";
	$sth = $db->prepare($sql);
	$sth->execute(array(
		':id_salle' => $_POST['id_salle'],
		':date_arrivee' => $_POST['date_arrivee'],
		':date_depart' => $_POST['date_depart'],
		':prix' => $_POST['prix'],
		':etat' => $_POST['etat'],
		':id' => $produitId
	));
	return true;
}

function delete($db, $produitId)
{
	$sth = $db->prepare("DELETE FROM produit WHERE id = :id");
	$sth->bindParam("id", $produitId);
	$sth->execute();
	return true;
}

?>