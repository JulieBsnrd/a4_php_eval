<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<h5>Gestions des Salles</h5>
		<a href="AdminSalleCtrl.php?path=create" class="btn blue">Ajouter une salle</a>
	</div>
	<div class="row">
		<?php foreach($salles as $salle) : ?>
			<div class="col s4">
				<img src="../../views/salles/photo/<?= $salle->photo ?>" class="responsive-img">
			</div>
			<div class="col s8">
				<p>Titre : <?= $salle->titre ?></p>
				<p>Description : <?= $salle->description ?></p>
                <p>Adresse : <?= $salle->adresse ?></p>
                <p>Code postal : <?= $salle->cp ?></p>
                <p>Ville : <?= $salle->ville ?></p>
                <p>Pays : <?= $salle->pays ?></p>
                <p>Capacité : <?= $salle->capacite ?></p>
                <p>Catégorie : <?= $salle->categorie ?></p>

                <!-- image -->
			</div>
			<div class="col s12">
				<div class="col s6">
					<a href="AdminSalleCtrl.php?id=<?= $salle->id ?>&action=get" class="btn green waves-effect waves-light">Editer
						<i class="material-icons right">mode_edit</i>
					</a>
				</div>
				<form method="GET" action="AdminSalleCtrl.php" class="col s6">
					<input type="hidden" name="action" value="delete">
					<input type="hidden" name="id" value="<?php echo $salle->id ?>">
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