<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 26/04/2018
 * Time: 14:58
 */

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


        <div class="lgn">
            <h2>Commandes passées</h2>
            <?php if (!empty($data['commandes'])): ?>
                <div class="col sm6">


                    <?php
                    foreach ($data['commandes'] as $produit) {
                        $produitsIds[] = $produit['produits_id'];
                    }

                    $nbProduits = count($produitsIds);
                    $nbValides = 0;

                    foreach ( $produitsIds as $key => $produitId ) {
                        if (empty($produitId)) {
                            unset( $produitsIds[$key] );
                        } else {
                            $nbValides++;
                        }
                    }

                    $produitsIds = array_values($produitsIds);
                    $nbRestant = $nbProduits - $nbValides;
                    ?>
                    <p>Vous avez commandé <?= $nbProduits ?> <?= $nbProduits > 1 ? 'produits' :  'produit' ?>.</p>
                    <?php if ( $nbRestant > 1 ): ?>
                        <p><?= $nbRestant ?> de ces produits ont été depuis supprimés du catalogue Lokisalle.</p>
                    <?php elseif ( $nbRestant === 1 ): ?>
                        <p>Un de ces produit a été depuis supprimé du catalogue Lokisalle.</p>
                    <?php endif; ?>
                    <p>
                        Voici la liste des produits commandés existant encore dans le catalogue Lokisalle :
                        <?php foreach ($produitsIds as $key => $produitId): ?>
                            <?php if ( $key ) { echo ' | '; } ?>
                            <a href="<?php racine() ?>/produit/index/<?= $produitId ?>"><?= $produitId ?></a>
                        <?php endforeach; ?>
                    </p>
                </div>
            <?php else: ?>
                <p>Vous n'avez pas encore passé de commande.</p>
            <?php endif; ?>

        </div>

    </div>
</div>