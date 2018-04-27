<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<h5>Gestions des Produits</h5>
		<a href="AdminProduitCtrl.php?path=create" class="btn blue">Ajouter un produit</a>
	</div>
	<div class="row">
		<?php if ($produits) {
		foreach($produits as $produit) : ?>
			<div class="col s8">
				<h6>Salle : <?= $produit->titre_salle ?></h6>
				<p>Prix : <?= $produit->prix ?></p>
				<p>Etat : <?= $produit->etat ?></p>
				<p>Date de départ : <?= $produit->date_depart ?></p>
				<p>Date de d'arrivée : <?= $produit->date_arrivee ?></p>
			</div>
			<div class="col s4">
				<div class="col s12">
					<img src="../../views/salles/photo/<?= $produit->photo_salle ?>" class="responsive-img">
				</div>
				<div class="col s12">
					<div class="row">
						<a href="AdminProduitCtrl.php?id=<?= $produit->id ?>&action=get" class="btn green waves-effect waves-light">Editer
							<i class="material-icons right">mode_edit</i>
						</a>
					</div>
					<form method="GET" action="AdminProduitCtrl.php" class="row">
						<input type="hidden" name="action" value="delete">
						<input type="hidden" name="id" value="<?php echo $produit->id ?>">
						<button class="btn red waves-effect waves-light" type="submit">Supprimer
							<i class="material-icons right">delete</i>
						</button>
					</form>
				</div>
			</div>
			
		<?php endforeach; } else { ?>
			<div class="col s8">
				<p>Pas de produit</p>
			</div>		
		<?php } ?>
	</div>
</div>

<?php
include ('../../views/templates/_footer.php');
?>