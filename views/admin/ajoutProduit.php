<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<div class="center-align">
			<h5>Ajouter un produit</h5>
		</div>
	</div>
	<div class="row">
		<form method="POST" action="AdminProduitCtrl.php">
			<input type="hidden" name="action" value="create">
			<div class="row">
				<div class="col s12">
					<h6>Etat</h6>
				</div>
				<div class="col s6">
					<p>
						<label>
				      		<input name="etat" value="libre" type="radio" checked/>
				      		<span>Libre</span>
				    	</label>
			    	</p>
				</div>
				<div class="col s6">
					<p>
						<label>
				      		<input name="etat" value="reservation" type="radio"/>
				      		<span>Reservée</span>
				    	</label>
			    	</p>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
						<select name="id_salle" class="browser-default">
							<?php foreach ($salles as $salle) : ?>
								<option value="<?= $salle->id ?>"><?= $salle->titre ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				<div class="input-field col s12">
					<input id="prix" type="text" class="validate" name="prix">
			        <label for="prix">Prix</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input type="text" class="datepicker" placeholder="date départ" name="date_depart">
				</div>
				<div class="input-field col s6">
					<input type="text" class="datepicker" placeholder="date arrivée" name="date_arrivee">
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
include ('../../views/templates/_footer.php');
?>