<?php

class CatalogController {



    public function balisage() 
    {
        // $tplName = 'balisage';
        // $this->show($tplName);
        require_once __DIR__.'/../views/balisage.tpl.php';
    }


    public function destockage()
    {
        // $tplName = 'destockage';
        // $this->show($tplName);
        require_once __DIR__.'/../views/destockage.tpl.php';
    }


    public function gobelet()
    {
        // $tplName = 'gobelet';
        // $this->show($tplName);
require_once __DIR__.'/../views/gobelet.tpl.php';
    }


    public function materiel()
    {
        // $tplName = 'materiel';
        // $this->show($tplName);
    require_once __DIR__.'/../views/materiel.tpl.php';}


    public function products()
    {
        // $tplName = 'products';
        // $this->show($tplName);
   require_once __DIR__.'/../views/products.tpl.php'; }
}