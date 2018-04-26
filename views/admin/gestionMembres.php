<div class="container">
	<div class="row">
		<h5>Gestions des membres</h5>
	</div>
	<div class="row">
		<?php foreach($membres as $membre) : ?>
			<div class="col s8">
				<h6><?php echo $membre['nom'].' '.$membre['prenom'].' ('.$membre['pseudo'].')'; ?></h6>
				<p>Email : <?php echo $membre['email'] ?></p>
				<p>Créer le : <?php echo $membre['date_enregistrement'] ?></p>
			</div>
			<div class="col s4">
				<div class="row">
					<a href="adminMembres.php?id=<?php echo $membre['id'] ?>" class="btn green waves-effect waves-light">Editer
						<i class="material-icons right">mode_edit</i>
					</a>
				</div>
				<form method="GET" action="adminMembres.php" class="row">
					<input type="hidden" name="action" value="delete">
					<input type="hidden" name="id" value="<?php echo $membre['id'] ?>">
					<button class="btn red waves-effect waves-light" type="submit">Supprimer
						<i class="material-icons right">delete</i>
					</button>
				</form>
			</div>
		<?php endforeach; ?>
	</div>
</div>
