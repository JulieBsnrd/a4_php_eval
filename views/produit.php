<?php
include ('../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<div class="center-align">
			<h5><?= $produit->id_salle ?></h5>
		</div>
	</div>
	<div class="row">
		<div class="row">
			<div class="col s12">
				<h6>Etat</h6>
			</div>
			<div class="col s6">
				<p>
					<label>
			      		<input name="etat" value="libre" type="radio" disabled <?= ($produit->etat) == "libre" ? 'checked' : '' ?>/>
			      		<span>Libre</span>
			    	</label>
		    	</p>
			</div>
			<div class="col s6">
				<p>
					<label>
			      		<input name="etat" value="reservation" type="radio" disabled <?= ($produit->etat) == "reservation" ? 'checked' : '' ?>/>
			      		<span>Reservée</span>
			    	</label>
		    	</p>
			</div>
		</div>
		<div class="row">
		<div class="input-field col s12">
			<p>Numéro salle : <?= $produit->id_salle ?></p>
			<p>Prix : <?= $produit->prix ?> €</p>
			<p>Date de départ : <?= $produit->date_depart ?></p>
			<p>Date de d'arrivée : <?= $produit->date_arrivee ?></p>
		</div>
	</div>
</div>

<?php
include ('../views/templates/_footer.php');
?>