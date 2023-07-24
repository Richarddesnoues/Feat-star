<?php
 namespace App\Controllers;
 use App\Models\Category;
 use App\Models\Product;
class CartController extends CoreController{

//    # ToDo faire panier
    public function cart()
    {  
        $this->show('cart');
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
    }
   
    public function addCart($productId)
    {
        global $router;
        $product = Product::find($productId);

    }
    

}   