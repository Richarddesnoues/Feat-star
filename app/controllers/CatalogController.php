<?php

class CatalogController {

    private function show($template, $viewVars = [])
    {
        global $baseUrl;
        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $template .'.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }


    public function category($params) {
        require_once __DIR__.'/../views/category.tpl.php';

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
         $tplName = 'materiel';
         $this->show($tplName);
    // require_once __DIR__.'/../views/materiel.tpl.php';
    }


    public function products($params)
    {
        $tplName = 'products';
        $this->show($tplName);
//    require_once __DIR__.'/../views/products.tpl.php'; 
    }
  }