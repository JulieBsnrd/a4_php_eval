<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 26/04/2018
 * Time: 14:58
 */

?>

<p class="centre">Bonjour <strong><?php $_SESSION['membre']['pseudo'] ?></strong></p>
<div class="cadre"><h2> Voici vos informations </h2>
    <p> votre email est: <?php $_SESSION['membre']['email'] ?><br>
        votre prénom est: <?php $_SESSION['membre']['prenom'] ?><br>
        votre nom est: <?php $_SESSION['membre']['nom'] ?><br>
        inscrit depuis le : <?php $_SESSION['membre']['date_enregistrement'] ?></p></div><br><br>