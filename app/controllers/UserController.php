<?php

namespace App\Controllers;


class UserController extends CoreController{ // récupere les information du parent
   


    public function logUser()
    {

         //$tplName = 'user';
         $this->show('user');
       // require_once __DIR__.'/../views/user.tpl.php';
    }

    public function registerUser()
    {
        //$tplName = 'registerUser';
        $this->show('registerUser');
    }
}