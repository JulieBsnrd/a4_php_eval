<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<div class="center-align">
			<h5>Ajouter une commande</h5>
		</div>
	</div>
	<div class="row">
		<form method="POST" action="AdminCommandeCtrl.php">
			<input type="hidden" name="action" value="create">
			<div class="row">
				<div class="input-field col s12">
					<select name="id_membre" class="browser-default">
						<option value="" disabled selected>Membre</option>
						<?php foreach ($membres as $membre) : ?>
							<option value="<?= $membre->id ?>"><?= $membre->email ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="input-field col s12">
					<select name="id_produit" class="browser-default">
						<option value="" disabled selected>Produit</option>
						<?php foreach ($produits as $produit) : ?>
							<option value="<?= $produit->id ?>"><?= $produit->titre_salle ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
		        	<button class="btn green waves-effect waves-light" type="submit">Ajouter
						<i class="material-icons right">send</i>
					</button>
		        </div>
			</div>
		</form>
	</div>
</div>

<?php
include ('../../views/templates/_footer.php');
?>