<?php

namespace App\controllers;

class MainController extends CoreController //  récupere les informations du parent
{

    

    public function home()
    {
        //$tplName = 'home';
        $this->show('home');
        //require_once __DIR__.'/../views/home.tpl.php';
    }

    
}
    
