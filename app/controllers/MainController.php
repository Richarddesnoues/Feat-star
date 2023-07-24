<?php

namespace App\controllers;

class MainController extends CoreController //  récupere les informations du parent
{
    public function home()
    {
        $this->show('home');  
    }
}
    
