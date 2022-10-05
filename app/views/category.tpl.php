
<?php global $router ;?>
<section class="product">
    <div class="productList">
        <h1><?= $viewVars['category']->getName(); ?></h1>
    </div>
    <?php foreach ($viewVars['products'] as $currentProduct): ?>
    <?php //var_dump($viewVars['category']->getName()) ?>
    <div>
        <img src="<?= $router->url($currentProduct->getPicture()); ?>" alt="image de la catégorie" >
    </div>
    <?php endforeach; ?>
</section>