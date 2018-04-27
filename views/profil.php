<?php
include ('../views/templates/_header.php');
?>

<div class="main-content blc">
    <div class="ctn">
        <h1> Mon profil </h1>
        <p class="centre">Bonjour <strong><?php echo $_SESSION['membre']['pseudo'] ?></strong></p>
        <div class="cadre">
            <p> votre email est: <?php echo $_SESSION['membre']['email'] ?><br>
                votre prénom est: <?php echo $_SESSION['membre']['prenom'] ?><br>
                votre nom est: <?php echo $_SESSION['membre']['nom'] ?><br>
                inscrit depuis le : <?php echo $_SESSION['membre']['date_enregistrement'] ?></p></div>
        <p><a href="modifier.php">Modifier votre profil</a></p>


        <div class="row">
            <h2>Commandes passées</h2>
            <?php if (!empty($commandes)): ?>
                <?php foreach($commandes as $commande): ?>
                    <div class="col s4">
                        <?php 
                            $produit = Produit::find($commande->id_produit);
                        ?>
                        <img src="../views/salles/photo/<?= $produit->photo_salle ?>" class="responsive-img">
                        <h5 class="center-align"><?= $produit->titre_salle.' ('.$produit->prix.' €)' ?></h5>
                        <p>Début : <?= $produit->date_depart ?></p>
                        <p>Fin : <?= $produit->date_arrivee ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Vous n'avez pas encore passé de commande.</p>
            <?php endif; ?>

        </div>

    </div>
</div>

<?php
include ('../views/templates/_footer.php');
?>