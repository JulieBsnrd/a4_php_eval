<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<h5>Gestions des membres</h5>
		<a href="AdminMembreCtrl.php?path=create" class="btn blue">Ajouter un utilisateur</a>
	</div>
	<div class="row">
		<?php foreach($membres as $membre) : ?>
			<div class="col s8">
				<h6><?= $membre->nom.' '.$membre->prenom.' ('.$membre->pseudo.')'; ?></h6>
				<p>Admin : <?= $membre->statut == "1" ? "oui" : "non"; ?></p>
				<p>Email : <?= $membre->email ?></p>
				<p>Créer le : <?= $membre->dateEnregistrement ?></p>
			</div>
			<div class="col s4">
				<div class="row">
					<a href="AdminMembreCtrl.php?id=<?= $membre->id ?>&action=get" class="btn green waves-effect waves-light">Editer
						<i class="material-icons right">mode_edit</i>
					</a>
				</div>
				<form method="GET" action="AdminMembreCtrl.php" class="row">
					<input type="hidden" name="action" value="delete">
					<input type="hidden" name="id" value="<?= $membre->id ?>">
					<button class="btn red waves-effect waves-light" type="submit">Supprimer
						<i class="material-icons right">delete</i>
					</button>
				</form>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php
include ('../../views/templates/_footer.php');
?>