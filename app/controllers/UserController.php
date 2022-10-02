<?php

class UserController {
    private function show($template, $viewVars = [])
    {
        
        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $template .'.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }


    public function logUser()
    {

         $tplName = 'user';
         $this->show($tplName);
       // require_once __DIR__.'/../views/user.tpl.php';
    }

    public function registerUser()
    {
        $tplName = 'registerUser';
        $this->show($tplName);
    }
}