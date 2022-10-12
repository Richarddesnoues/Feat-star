<?php

namespace App\Controllers;


class CoreController 
{
    // Déclenche l'affichage d'un template spécifique
    protected function show($template, $viewVars = []) // La visibilité à été modifié en protected car ce la authorise le parent à transmetre ses données
    {                
                                          // contrairement à private
        
    

       // extract($viewVars);


        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $template .'.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }
}