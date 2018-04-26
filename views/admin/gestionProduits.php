<div class="container">
	<div class="row">
		<h5>Gestions des Produits</h5>
		<a href="adminProduits.php?path=create" class="btn blue">Ajouter un produit</a>
	</div>
	<div class="row">
		<?php foreach($produits as $produit) : ?>
			<div class="col s8">
				<h6><?php echo $produit['nom'].' '.$produit['prenom'].' ('.$produit['pseudo'].')'; ?></h6>
				<p>Admin : <?= $produit['statut'] == "1" ? "oui" : "non"; ?></p>
				<p>Email : <?php echo $produit['email'] ?></p>
				<p>Créer le : <?php echo $produit['date_enregistrement'] ?></p>
			</div>
			<div class="col s4">
				<div class="row">
					<a href="adminProduits.php?id=<?= $produit['id'] ?>&action=get" class="btn green waves-effect waves-light">Editer
						<i class="material-icons right">mode_edit</i>
					</a>
				</div>
				<form method="GET" action="adminProduits.php" class="row">
					<input type="hidden" name="action" value="delete">
					<input type="hidden" name="id" value="<?php echo $produit['id'] ?>">
					<button class="btn red waves-effect waves-light" type="submit">Supprimer
						<i class="material-icons right">delete</i>
					</button>
				</form>
			</div>
		<?php endforeach; ?>
	</div>
</div>
