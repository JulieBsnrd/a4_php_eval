<?php
include ('../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<h4 class="center-align">Boutique</h4>
	</div>
	<div class="row">
		<?php foreach($produits as $produit) : ?>
			<div class="col s8">
				<h6><?= $produit['id_salle'] ?></h6>
				<p>Prix : <?= $produit['prix'] ?> €</p>
				<p>Etat : <?= $produit['etat'] ?></p>
				<p>Date de départ : <?= $produit['date_depart'] ?></p>
				<p>Date de d'arrivée : <?= $produit['date_arrivee'] ?></p>
			</div>
			<div class="col s4">
				<div class="row">
					<a href="BoutiqueCtrl.php?id=<?= $produit['id'] ?>&action=get" class="btn blue waves-effect waves-light">Détails
						<i class="material-icons">details</i>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php
include ('../views/templates/_footer.php');
?>