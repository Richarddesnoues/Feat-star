
<?php global $router ;?>
<section class="product">

    <div class="productList">
        <h1><?= $viewVars['category']->getName(); ?></h1>
    </div>
    <?php //var_dump($viewVars['category']->getName()) ?>
    <div>
    <img src="<?= $router->url($viewVars['category']->getPicture()); ?>" alt="image de la catégorie" >
    </div>
</section>