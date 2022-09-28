<?php

class CatalogController {

    private function show($template, $viewVars = [])
    {
        
        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $template .'.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }


    public function category($params) {
        $category = Category::find($params['id']);
        var_dump($category);
        require_once __DIR__.'/../views/category.tpl.php';

    }

    public function product($params)
    {
        $product = Product::find($params['id']);
        var_dump($product);
        // $tplName = 'product';
        // $this->show($tplName);
   require_once __DIR__.'/../views/product.tpl.php'; 
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
         $this->show($tplName);
    // require_once __DIR__.'/../views/materiel.tpl.php';
    }


    
  }