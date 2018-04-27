<?php
include ('../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<h4 class="center-align">Boutique</h4>
	</div>
	<div class="row">
		<?php foreach($produits as $produit) : ?>
			<div class="col s12">
				<div class="col s4">
					<img src="../views/salles/photo/<?= $produit->photo_salle ?>" class="responsive-img">
				</div>
				<div class="col s4">
					<h6><?= $produit->titre_salle ?></h6>
					<p>Date de départ : <?= $produit->date_depart ?></p>
					<p>Date de d'arrivée : <?= $produit->date_arrivee ?></p>
				</div>
				<div class="col s4 center-align">
					<div class="row">
						<h5><?= $produit->prix ?> €</h5>
					</div>
					<div class="row">
						<a href="BoutiqueCtrl.php?id=<?= $produit->id ?>&action=get" class="btn blue waves-effect waves-light">Détails
							<i class="material-icons right">details</i>
						</a>
					</div>
					<div class="row">
						<a href="BoutiqueCtrl.php?id=<?= $produit->id ?>&action=buy" class="btn blue waves-effect waves-light">Commander
							<i class="material-icons right">shopping_basket</i>
						</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php
include ('../views/templates/_footer.php');
?>