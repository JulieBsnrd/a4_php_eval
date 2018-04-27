<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<div class="center-align">
			<h5>Ajouter un avis</h5>
		</div>
	</div>
	<div class="row">
		<form method="POST" action="AdminAvisCtrl.php">
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
					<select name="id_salle" class="browser-default">
						<option value="" disabled selected>Salle</option>
						<?php foreach ($salles as $salle) : ?>
							<option value="<?= $salle->id ?>"><?= $salle->titre ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<textarea id="commentaire" class="materialize-textarea" name="commentaire"></textarea>
					<label for="commentaire">Commentaire</label>
				</div>
			</div>
			<div class="row">
				<p>Note</p>
				<p class="range-field">
      				<input type="range" name="note" min="0" max="10" />
    			</p>
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