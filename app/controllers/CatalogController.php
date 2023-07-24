<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class CatalogController extends CoreController {
    // Gère les requetes get /category
    
    public function categories() {
        $categories = Category::findAll();
        $this->show('categories', ['categories' => $categories]);

        // ou plus court  $this->show('categories', ['categories' => Category::findAll()]);

    }

    public function category($params) {
        $category = Category::find($params['id']);
        
         // je récupère tous les produits qui correspondent à cette catégorie
        $products = $category->products();
        
        //dump($category);
        //require_once __DIR__.'/../views/category.tpl.php';
        //dump($products);
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






    

    
  }