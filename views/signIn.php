﻿<?php
include ('../views/templates/_header.php');
?>

<div class="main-content blc">
    <div class="ctn">


        <form action="SignInCtrl.php" method="post" class="form">
            <fieldset>
                <legend>Connexion</legend>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="pseudo" type="text" class="validate" name="pseudo">
                        <label for="pseudo">Pseudo</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="mdp" type="password" class="validate" name="mdp">
                        <label for="mdp">Mot de passe</label>
                    </div>
                </div>
                <input class="btn green" type="submit">
            </fieldset>
        </form>

        <p>Pas encore inscrit ? <a href="SignUpCtrl.php">Cliquez ici pour corriger cela !</a></p>

    </div>
</div>

<?php
include ('../views/templates/_footer.php');
?>
