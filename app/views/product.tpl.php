 <?php global $router; ?>
 <section class="product">

     <div class="breadcrum">
         <li>Accueil</li> /
         <li>
            <a href= "<?= $viewVars['category']->getName(); ?>"> <?= $viewVars['category']->getName(); ?></a>
        </li> /
         <li>
            <a href= "<?= $viewVars['product']->getName(); ?>"><?= $viewVars['product']->getName(); ?></a>
        </li>
     </div>

     <div class="display">
         <div class="leftDisplay">
             <div class="img_items">
                 <img class="img_item" src="<?= $router->url($viewVars['product']->getPicture()); ?>" alt="product">
             </div>
         </div>


         <div class="rightDisplay">

             <div class="productItem">
                 <h1> <?= $viewVars['product']->getName(); ?></h1>
             </div>

             <div class="price">
                 <span><?= $viewVars['product']->getPrice(); ?></span>€ TTC
             </div>

             <div class="add_cart_button">
                <form action method="post">
                    <input type="hidden" name="product_id" value="1">
                    <button class="button">Ajouter au panier</button>

                </form>
             </div>

             <div class="describe">
                 <p><?= $viewVars['product']->getDescription(); ?></p>
             </div>
         </div>
     </div>
 </section>