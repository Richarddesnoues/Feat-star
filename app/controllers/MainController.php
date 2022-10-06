<?php
class MainController extends CoreController
{

    

    public function home()
    {
        $tplName = 'home';
        $this->show($tplName);
        //require_once __DIR__.'/../views/home.tpl.php';
    }

    
}
    
