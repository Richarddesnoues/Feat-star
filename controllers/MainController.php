<?php
class MainController
{
    public function show($template, $viewVars = [])
    {
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/'.$template;
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}

