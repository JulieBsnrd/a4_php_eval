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

function create()
{

}

function update($db, $salleId)
{

}

function delete($db, $salleId)
{

}

?>