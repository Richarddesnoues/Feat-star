<?php

class CartController {

    private function show($template, $viewVars = [])
    {
        global $baseUrl;
        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $template .'.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }
    public function cart()
    {
        $tplName = 'cart';
        $this->show($tplName);
        //require_once __DIR__.'/../views/cart.tpl.php';
    }
}