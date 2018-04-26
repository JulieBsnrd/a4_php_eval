<?php
include ('views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<div class="center-align">
			<h5><?= $produit['id_salle'] ?></h5>
		</div>
	</div>
	<div class="row">
		<form method="POST" action="adminProduits.php">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?=  $produit['id'] ?>">
			<div class="row">
				<div class="col s12">
					<h6>Etat</h6>
				</div>
				<div class="col s6">
					<p>
						<label>
				      		<input name="etat" value="libre" type="radio" <?= ($produit['etat']) == "libre" ? 'checked' : '' ?>/>
				      		<span>Libre</span>
				    	</label>
			    	</p>
				</div>
				<div class="col s6">
					<p>
						<label>
				      		<input name="etat" value="reservation" type="radio" <?= ($produit['etat']) == "reservation" ? 'checked' : '' ?>/>
				      		<span>Reservée</span>
				    	</label>
			    	</p>
				</div>
			</div>
			<div class="row">
			<div class="input-field col s12">
					<input id="salle_id" type="text" class="validate" name="salle_id" value="<?= $produit['id_salle'] ?>">
			        <label for="salle_id">Numéro salle</label>
				</div>
				<div class="input-field col s12">
					<input id="prix" type="text" class="validate" name="prix" value="<?= $produit['prix'] ?>">
			        <label for="prix">Prix</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input type="text" class="datepicker" name="date_depart" placeholder="date départ" value="<?= $produit['date_depart']  ?>">
				</div>
				<div class="input-field col s6">
					<input type="text" class="datepicker" name="date_arrivee" placeholder="date arrivée" value="<?= $produit['date_arrivee']  ?>">
				</div>
			</div>
			<div class="row">
				<div class="col s12">
		        	<button class="btn green waves-effect waves-light" type="submit">Envoyer
						<i class="material-icons right">send</i>
					</button>
		        </div>
			</div>
		</form>
	</div>
</div>

<?php
include ('views/templates/_footer.php');
?>