<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 26/04/2018
 * Time: 14:58
 */

?>


<p class="centre">Bonjour <strong><?php echo $_SESSION['membre']['pseudo'] ?></strong></p>
<div class="cadre"><h2> Voici vos informations </h2>
    <p> votre email est: <?php echo $_SESSION['membre']['email'] ?><br>
        votre prénom est: <?php echo $_SESSION['membre']['prenom'] ?><br>
        votre nom est: <?php echo $_SESSION['membre']['nom'] ?><br>
        inscrit depuis le : <?php echo $_SESSION['membre']['date_enregistrement'] ?></p></div><br><br>