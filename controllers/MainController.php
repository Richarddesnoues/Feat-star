<?php
class MainController
{
    private function show($template, $viewVars = [])
    {
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/'.$template;
        require_once __DIR__ . '/../views/footer.tpl.php';
    }


    public function error404()
    {
        $tplName = '404.tpl.php';
        $this->show($tplName);

    }

    
    public function balisage() 
    {
        $tplName = 'balisage.tpl.php';
        $this->show($tplName);
    }

    public function cart()
    {
        $tplName = 'cart.tpl.php';
        $this->show($tplName);
    }

    public function cgv()
    {
        $tplName = 'cgv.tpl.php';
        $this->show($tplName);
    }


    public function contact()
    {
        $tplName = 'contact.tpl.php';
        $this->show($tplName);
    }


    public function destockage()
    {
        $tplName = 'destockage.tpl.php';
        $this->show($tplName);
    }


    public function gobelet()
    {
        $tplName = 'gobelet.tpl.php';
        $this->show($tplName);

    }


    public function materiel()
    {
        $tplName = 'materiel.tpl.php';
        $this->show($tplName);
    }


    public function products()
    {
        $tplName = 'products.tpl.php';
        $this->show($tplName);
    }


    public function user()
    {
        $tplName = 'user.tpl.php';
        $this->show($tplName);
    }

    public function home()
    {
        $tplName = 'home.tpl.php';
        $this->show($tplName);
    }

    
}
    
