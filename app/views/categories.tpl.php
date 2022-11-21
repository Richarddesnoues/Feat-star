

 <?php global $router; ?>

<section class="categories">
    <div class="categoryList">
        <h1><?= $viewVars['categories']->getName(); ?></h1>
    </div>

    <?php foreach ($viewVars['categories'] as $currentCategory) : ?>
        <?php //var_dump($viewVars['category']->getName()) 
        ?>
        <div class="item_bloc">

            <div class="item_picture">
                <img src="<?= $router->url($currentCategory->getPicture()); ?>" alt="<?= $currentCategory->getName() ?>">
            </div>
            <div class="item_name">
                <?= $currentCategory->getName() ?>
            </div>
            
            <div class="bt_product">
                <a href=" <?= $router->url("catalogue/produit/{$currentCategory->getId()}") ?>">Voir le produit</a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</section> 