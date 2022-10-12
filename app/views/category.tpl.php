<?php global $router; ?>

<section class="product_category">
    <div class="productList">
        <h1><?= $viewVars['category']->getName(); ?></h1>
    </div>

    <div class="item_wrap">
        <?php foreach ($viewVars['products'] as $currentProduct) : ?>
            <?php //var_dump($viewVars['category']->getName()) 
            ?>


            <div class="item_bloc">
                <div class="item_category">


                    <div class="item_picture">
                        <img src="<?= $router->url($currentProduct->getPicture()); ?>" alt="<?= $currentProduct->getName() ?>">
                    </div>
                    <div class="item_name">
                        <?= $currentProduct->getName() ?>
                    </div>
                    <div class="item_price">
                        <?= $currentProduct->getPrice() ?>€
                    </div>
                    <div class="bt_product">
                        <a href=" <?= $router->url("catalogue/produit/{$currentProduct->getId()}") ?>">Voir le produit</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
    </div>
</section>