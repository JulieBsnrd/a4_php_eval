<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<div class="center-align">
			<h5>Ajouter un membre</h5>
		</div>
	</div>
	<div class="row">
		<form method="POST" action="AdminMembreCtrl.php">
			<input type="hidden" name="action" value="create">
			<div class="row">
				<div class="col s6">
					<p>
						<label>
				      		<input name="civilite" value="m" type="radio" checked/>
				      		<span>M</span>
				    	</label>
			    	</p>
				</div>
				<div class="col s6">
					<p>
						<label>
				      		<input name="civilite" value="f" type="radio"/>
				      		<span>F</span>
				    	</label>
			    	</p>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
		          	<input id="prenom" type="text" class="validate" name="prenom">
		          	<label for="prenom">Prénom</label>
		        </div>
		        <div class="input-field col s6">
		          	<input id="nom" type="text" class="validate" name="nom">
		          	<label for="nom">Nom</label>
		        </div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="pseudo" type="text" class="validate" name="pseudo">
			        <label for="pseudo">Pseudo</label>
				</div>
				<div class="col s12">
					<h6>Admin</h6>
				</div>
				<div class="col s6">
					<p>
						<label>
				      		<input name="statut" value="1" type="radio"/>
				      		<span>Oui</span>
				    	</label>
			    	</p>
				</div>
				<div class="col s6">
					<p>
						<label>
				      		<input name="statut" value="0" type="radio" checked/>
				      		<span>Non</span>
				    	</label>
			    	</p>
				</div>
				<div class="input-field col s12">
			        	<input id="email" type="email" class="validate" name="email">
			        	<label for="email">Email</label>
		        </div>
				<div class="input-field col s12">
		          	<input id="mdp" type="password" class="validate" name="mdp">
		          	<label for="mdp">Mot de passe</label>
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