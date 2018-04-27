<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<h5>Gestions des avis</h5>
		<a href="AdminAvisCtrl.php?path=create" class="btn blue">Ajouter un avis</a>
	</div>
	<div class="row">
		<table>
        	<tr>
        		<th>Membre</th>
        		<th>Salle</th>
        		<th>Commentaire</th>
        		<th>Note</th>
        		<th>Créé</th>
        	</tr>
        	<?php if(isset($avis)) : ?>
				<?php foreach($avis as $avi) : ?>
		        	<tr>
		        		<td>
		        			<?php
		        				foreach($membres as $membre){
		        					if($membre['id'] == $avi->id_membre){
		        						echo $membre['email'];
		        					}
		        				}
		        			?>
		        		</td>
		        		<td>
		        			<?php
		        				foreach($salles as $salle){
		        					if($salle['id'] == $avi->id_salle){
		        						echo '<div class="row center-align">'.$salle['titre'].'</div>';
		        						echo '<img src="../../views/salles/photo/'.$salle['photo'].'" class="row center-align" width="200">';
		        					}
		        				}
		        			?>							
		        		</td>
		        		<td><?= $avi->note ?> / 10</td>
		        		<td><?= $avi->date_enregistrement ?></td>
		        		<td>
		        			<div class="row">
		        				<a href="AdminAvisCtrl.php?id=<?= $avi->id ?>&action=get" class="btn green waves-effect waves-light">Editer
									<i class="material-icons right">mode_edit</i>
								</a>
		        			</div>
		        			<div class="row">
		        				<form method="GET" action="AdminAvisCtrl.php">
									<input type="hidden" name="action" value="delete">
									<input type="hidden" name="id" value="<?php echo $avi->id ?>">
									<button class="btn red waves-effect waves-light" type="submit">Supprimer
										<i class="material-icons right">delete</i>
									</button>
								</form>
		        			</div>
		        		</td>
		        	</tr>
        		<?php endforeach; ?>
			<?php endif; ?>
        </table>
	</div>
</div>

<?php
include ('../../views/templates/_footer.php');
?>