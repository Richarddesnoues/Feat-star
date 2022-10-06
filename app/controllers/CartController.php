<?php

class CartController extends CoreController{

   
    public function cart()
    {
        $tplName = 'cart';
        $this->show($tplName);
        //require_once __DIR__.'/../views/cart.tpl.php';
    }
}