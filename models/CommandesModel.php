<?php

//TODO utiliser les jointures
function getAll($db)
{
	$req = $db->prepare('SELECT * FROM commande');
    $req->execute();

    $commandes = $req->fetchAll();

    return $commandes;
}

function getOne($db, $commandeId)
{
    $req = $db->prepare('SELECT * FROM commande WHERE id = ?');
    $req->execute(array($commandeId));

    $commande = $req->fetch();

    return $commande;
}

function create($db)
{
	$sql = "INSERT INTO commande SET id_membre = :id_membre, id_produit = :id_produit, date_enregistrement = :date_enregistrement";
	$req = $db->prepare($sql);
	$req->execute(array(
		':id_membre' => $_POST['id_membre'],
		':id_produit' => $_POST['id_produit'],
		':date_enregistrement' => date('Y-m-d H:i:s')
	));
    return true;
}

function update($db, $commandeId)
{
	$sql = "UPDATE commande SET id_membre = :id_membre, id_produit = :id_produit WHERE id = :id";
	$sth = $db->prepare($sql);
	$sth->execute(array(
		':id_membre' => $_POST['id_membre'],
		':id_produit' => $_POST['id_produit'],
		':id' => $commandeId
	));
	return true;
}

function delete($db, $commandeId)
{
	$sth = $db->prepare("DELETE FROM commande WHERE id = :id");
	$sth->bindParam("id", $commandeId);
	$sth->execute();
	return true;
}

?>