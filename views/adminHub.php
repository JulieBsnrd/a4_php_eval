<?php
include ('views/templates/_header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="views/css/img/member.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Gestion des membres</h5>
                    <p class="card-text">Cliquez ici si vous souhaitez ajouter, voir, modifier ou supprimer un membre.</p>
                    <a href="adminMembres.php" class="btn btn-primary">Gérer les membres</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="views/css/img/order.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Gestion des commandes</h5>
                    <p class="card-text">Cliquez ici si vous souhaitez ajouter, voir, modifier ou supprimer une commande.</p>
                    <a href="#" class="btn btn-primary">Gérer les commandes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="views/css/img/product.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Gestion des produits</h5>
                    <p class="card-text">Cliquez ici si vous souhaitez ajouter, voir, modifier ou supprimer un produit.</p>
                    <a href="adminProduits.php" class="btn btn-primary">Gérer les produits</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ('views/templates/_footer.php');
?>
