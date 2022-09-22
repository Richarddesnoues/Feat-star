<?php
class MainController
{

    private function show($template, $viewVars = [])
    {
        
        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $template .'.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }

    public function home()
    {
        $tplName = 'home';
        $this->show($tplName);
        //require_once __DIR__.'/../views/home.tpl.php';
    }

    
}
    
