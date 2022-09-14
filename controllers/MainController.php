<?php
class MainController
{
    private function show($template, $viewVars = [])
    {
        require_once __DIR__ . '/../views/header.tpl.php';
        // je concatene le $template demandé avec la fin du nom du fichier pour éviter de le répéter à chaque fois(ex: 404.tpl.php, balisage.tpl.php....)
        
        require_once __DIR__ . '/../views/'.$template.'.tpl.php'; 
        require_once __DIR__ . '/../views/footer.tpl.php';
    }


    public function error404()
    {
        $tplName = '404';
        $this->show($tplName);

    }

    
    public function balisage() 
    {
        $tplName = 'balisage';
        $this->show($tplName);
    }

    public function cart()
    {
        $tplName = 'cart';
        $this->show($tplName);
    }

    public function cgv()
    {
        $tplName = 'cgv';
        $this->show($tplName);
    }


    public function contact()
    {
        $tplName = 'contact';
        $this->show($tplName);
    }


    public function destockage()
    {
        $tplName = 'destockage';
        $this->show($tplName);
    }


    public function gobelet()
    {
        $tplName = 'gobelet';
        $this->show($tplName);

    }


    public function materiel()
    {
        $tplName = 'materiel';
        $this->show($tplName);
    }


    public function products()
    {
        $tplName = 'products';
        $this->show($tplName);
    }


    public function user()
    {
        $tplName = 'user';
        $this->show($tplName);
    }

    public function home()
    {
        $tplName = 'home';
        $this->show($tplName);
    }

    
}
    
