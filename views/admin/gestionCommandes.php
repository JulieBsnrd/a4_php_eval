<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<h5>Gestions des Commandes</h5>
		<a href="AdminCommandeCtrl.php?path=create" class="btn blue">Ajouter une commande</a>
	</div>
	<div class="row">
        <table>
        	<tr>
        		<th>Membre</th>
        		<th>Produit</th>
        		<th>Total (€)</th>
        		<th>Date</th>
        		<th>Action</th>
        	</tr>
        	<?php if(isset($commandes)) : ?>
				<?php foreach($commandes as $commande) : ?>
		        	<tr>
		        		<td>
		        			<?php
		        				foreach($membres as $membre){
		        					if($membre['id'] == $commande->id_membre){
		        						echo $membre['email'];
		        					}
		        				}
		        			?>
		        		</td>
		        		<td>
		        			<?php
		        				foreach($produits as $produit){
		        					if($produit['id'] == $commande->id_produit){
		        						echo '<div class="row center-align">'.$produit['titre'].'</div>';
		        						echo '<img src="../../views/salles/photo/'.$produit['photo'].'" class="row center-align" width="200">';
		        					}
		        				}
		        			?>							
		        		</td>
		        		<td>
		        			<?php
		        				foreach($produits as $produit){
		        					if($produit['id'] == $commande->id_produit){
		        						echo '<div class="row center-align">'.$produit['prix'].' €</div>';
		        					}
		        				}
		        			?>	
		        		</td>
		        		<td><?= $commande->date_enregistrement ?></td>
		        		<td>
		        			<div class="row">
		        				<a href="AdminCommandeCtrl.php?id=<?= $commande->id ?>&action=get" class="btn green waves-effect waves-light">Editer
									<i class="material-icons right">mode_edit</i>
								</a>
		        			</div>
		        			<div class="row">
		        				<form method="GET" action="AdminCommandeCtrl.php">
									<input type="hidden" name="action" value="delete">
									<input type="hidden" name="id" value="<?php echo $commande->id ?>">
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