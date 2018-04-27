<?php
include ('../../views/templates/_header.php');
?>

<div class="container">
	<div class="row">
		<div class="center-align">
			<h5>Ajouter une salle</h5>
		</div>
	</div>
	<div class="row">
		<form method="POST" action="AdminSalleCtrl.php">
			<input type="hidden" name="action" value="create">

			<div class="row">
			<div class="input-field col s12">
					<input id="titre" type="text" class="validate" name="titre">
			        <label for="titre">Titre</label>
				</div>
                <div class="input-field col s12">
                    <input id="description" type="text" class="validate" name="description">
                    <label for="description">Description</label>
                </div>
            </div>
        </div>
        <div class="row">
<<<<<<< HEAD
            <form method="POST" action="AdminSalleCtrl.php" enctype="multipart/form-data">
=======
            <form method="POST" action="adminSalles.php" enctype="multipart/form-data">
>>>>>>> 96d07098af0e7ef9f40b549aeeb2623270a69cce
                <input type="hidden" name="action" value="create">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="titre" type="text" class="validate" name="titre">
                        <label for="titre">Titre</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="description" type="text" class="validate" name="description">
                        <label for="description">Description</label>
                    </div>
                </div>
                <div class="row">

                    <div class="input-field col s12">
                        <input id="adresse" type="text" class="validate" name="adresse">
                        <label for="adresse">Adresse</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="cp" type="text" class="validate" name="cp">
                        <label for="cp">CP</label>
                    </div>
                </div>
                <div class="row">

                    <div class="input-field col s12">
                        <input id="ville" type="text" class="validate" name="ville">
                        <label for="ville">Ville</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="pays" type="text" class="validate" name="pays">
                        <label for="pays">Pays</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="capacite" type="text" class="validate" name="capacite">
                        <label for="capacite">Capacité</label>
                    </div>
                    <div class="col s6">
                        <h6>Catégorie</h6>
                    </div>
                    <div class="col s2">
                        <p>
                            <label>
                                <input name="categorie" value="reunion" type="radio" checked/>
                                <span>Réunion</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s2">
                        <p>
                            <label>
                                <input name="categorie" value="bureau" type="radio"/>
                                <span>Bureau</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s2">
                        <p>
                            <label>
                                <input name="categorie" value="formation" type="radio"/>
                                <span>Formation</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">

                        <div class="col s6">
                            <h6>Image</h6>
                        </div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                        <input type="file" name="photo">

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