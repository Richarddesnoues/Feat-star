<?php

class CatalogController {
    // Gère les requetes get /category
    // Déclenche l'affichage d'un template spécifique
    
    private function show($template, $viewVars = [])
    {
        
        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $template .'.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }

    public function category($params) {
        // je récupère tous les produits qui correspondent à cette catégorie
        $category = Category::find($params['id']);
        $products = $category->products();
        
        //var_dump($category);
        //require_once __DIR__.'/../views/category.tpl.php';
        $this->show('category', ['products' => $products,  'category' => $category]);

    }

    public function product($params)
    {
        $product = Product::find($params['id']);
        //var_dump($product);


        // On récupère la categorie pour compléter le breadcrumb
        $category = Category::find($product->getCategory_id());


        // Je récupère tous les types des produits

        $type = Type::find($product->getType_id());

        // $tplName = 'product';
        // $this->show($tplName);
        $this->show('product', ['product' => $product, 'type' => $type, 'category' => $category]);
   //require_once __DIR__.'/../views/product.tpl.php'; 
    }






    public function balisage($params) 
    {
        $tplName = 'balisage';
        $this->show($tplName);
        // require_once __DIR__.'/../views/balisage.tpl.php';
    }


    public function destockage($params)
    {
        $tplName = 'destockage';
        $this->show($tplName);
        // require_once __DIR__.'/../views/destockage.tpl.php';
    }


    public function gobelet($params)
    {
        $tplName = 'gobelet';
        $this->show($tplName);
// require_once __DIR__.'/../views/gobelet.tpl.php';
    }


    public function materiel($params)
    {
        // Avant d'afficher le bon template il faut récupérer les données du produit demandé dans la BDD.
        //$product = Product::find($params['id']);
         $tplName = 'materiel';
         $this->show($tplName, [$tplName => $tplName]);
    // require_once __DIR__.'/../views/materiel.tpl.php';
    }


    
  }