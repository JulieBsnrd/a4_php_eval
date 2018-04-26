<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 26/04/2018
 * Time: 09:53
 */
?>

<div class="main-content blc">
    <div class="ctn">

        <h1>Inscription</h1>


        <form action="" method="post" class="form">
            <fieldset>
                <legend>Inscription</legend>

                <label>Nom d'utilisateur : </label>
                <input type="text" name="pseudo" value="">

                <label>Mot de passe :</label>
                <input type="password" name="mdp">

                <label>Confirmez votre mot de passe :</label>
                <input type="password" name="mdp_bis">

                <label>Prénom &amp; Nom :</label>
                <input type="text" name="nom" value="">

                <label>E-mail :</label>
                <input type="text" name="email" value="">

                <label>Homme :</label>
                <input type="radio" name="sexe" value="m">

                <label>Femme :</label>
                <input type="radio" name="sexe" value="f">

                <label>Ville :</label>
                <input type="text" name="ville" value="">

                <label>Code postal :</label>
                <input type="text" name="cp" value="">

                <label>Adresse :</label>
                <input type="text" name="adresse" value="">

                <input type="submit">
            </fieldset>
        </form>

    </div>
</div>


