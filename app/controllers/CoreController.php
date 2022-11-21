<?php

namespace App\Controllers;


abstract class CoreController 
{
    // Déclenche l'affichage d'un template spécifique
    protected function show($template, $viewVars = []) // La visibilité à été modifié en protected car cela autorise le parent à transmetre ses données
    {                
                                                      // contrairement à private
        
    

        extract($viewVars);


        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $template .'.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }



//     public function checkAuthorisation($isAmin)
//     {
//         // On vérifie que l'utilisateur est connecté
//         if(isset($_SESSION['userId'])) {
            
//             $connectedUser = $_SESSION['connectecUser'];
//             $isAmin = $connectedUser->getIsAdmin();
    
//         }
//     }
 }


