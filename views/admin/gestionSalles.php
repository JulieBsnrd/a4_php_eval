<?php
include ('views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<h5>Gestions des Salles</h5>
		<a href="adminSalles.php?path=create" class="btn blue">Ajouter une salle</a>
	</div>
	<div class="row">
		<?php foreach($salles as $salle) : ?>
			<div class="col s8">
				<h6><?= $salle['id'] ?></h6>
				<p>Titre : <?= $salle['titre'] ?></p>
				<p>Description : <?= $salle['description'] ?></p>
                <p>Adresse : <?= $produit['adresse'] ?></p>
                <p>Code postal : <?= $produit['cp'] ?></p>
                <p>Ville : <?= $produit['ville'] ?></p>
                <p>Pays : <?= $produit['pays'] ?></p>
                <p>Capacité : <?= $produit['capacite'] ?></p>
                <p>Catégorie : <?= $produit['catgorie'] ?></p>

                <!-- image -->
			</div>
			<div class="col s4">
				<div class="row">
					<a href="adminSalles.php?id=<?= $salle['id'] ?>&action=get" class="btn green waves-effect waves-light">Editer
						<i class="material-icons right">mode_edit</i>
					</a>
				</div>
				<form method="GET" action="adminSalles.php" class="row">
					<input type="hidden" name="action" value="delete">
					<input type="hidden" name="id" value="<?php echo $salle['id'] ?>">
					<button class="btn red waves-effect waves-light" type="submit">Supprimer
						<i class="material-icons right">delete</i>
					</button>
				</form>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php
include ('views/templates/_footer.php');
?>