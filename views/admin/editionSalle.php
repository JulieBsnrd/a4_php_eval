<?php
include ('../../views/templates/_header.php');
?>

<div class="container">

	<div class="row">
		<form method="POST" action="AdminSalleCtrl.php">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?=  $salle->id ?>">
            <div class="row">
                <div class="input-field col s12">
                    <input id="id_salle" type="text" class="validate" name="titre" value="<?= $salle->titre ?>">
                    <label for="id_salle">Titre</label>
                </div>
                <div class="input-field col s12">
                    <input id="id_salle" type="text" class="validate" name="description" value="<?= $salle->description ?>">
                    <label for="id_salle">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="prix" type="text" class="validate" name="pays" value="<?= $salle->pays ?>">
                    <label for="prix">Pays</label>
                </div>
                <div class="input-field col s12">
                    <input id="prix" type="text" class="validate" name="ville" value="<?= $salle->ville ?>">
                    <label for="prix">Ville</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="prix" type="text" class="validate" name="capacite" value="<?= $salle->capacite ?>">
                    <label for="prix">Capacité</label>
                </div>

                    <div class="col s6">
                        <h6>Catégorie</h6>
                    </div>
                    <div class="col s2">
                        <p>
                            <label>
                                <input name="categorie" value="reunion" type="radio" <?= ($salle->categorie) == "reunion" ? 'checked' : '' ?>/>
                                <span>Réunion</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s2">
                        <p>
                            <label>
                                <input name="categorie" value="bureau" type="radio" <?= ($salle->categorie) == "bureau" ? 'checked' : '' ?>/>
                                <span>Bureau</span>
                            </label>
                        </p>
                    </div>
                <div class="col s2">
                    <p>
                        <label>
                            <input name="categorie" value="formation" type="radio" <?= ($salle->categorie) == "formation" ? 'checked' : '' ?>/>
                            <span>Formation</span>
                        </label>
                    </p>
                </div>
<!-- image -->
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