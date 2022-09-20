<?php

class UserController {
    public function user()
    {
        // $tplName = 'user';
        // $this->show($tplName);
        require_once __DIR__.'/../views/user.tpl.php';
    }
}