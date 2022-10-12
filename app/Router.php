<?php

namespace App;


class Router 
//pour chaque action je vais créer une fonction
{
    public $router;
    public $match;
    // public $baseUrl;
   
    
    
    


    public function __construct() // 1# Initialisation
    {
        $this->router = new \AltoRouter();

         //$baseUrl = substr($_SERVER['PHP_SELF'], 0, -1 * strlen('/index.php'));
         //$this->router->setBasePath($baseUrl);
         $this->router->setBasePath($_SERVER['BASE_URI']);// Voir doc Apache
        // global $baseUrl;

    }

    // 2# Déclaration
    public function map($method, $path, $endpoint)
    {
        // $router->map('GET', '/', ['controller' => 'MainController', 'method' => 'home']);
        // $router->map('GET', '/cart', ['controller' => 'CartController', 'method' => 'cart']);
        $this->router->map($method, $path, $endpoint);
    }

    // 3# Vérification
    public function match()
    {

        $this->match = $this->router->match();
        //var_dump($this->match);
        
    }





    // Je vais utiliser $match['target'] pour instencier le controleur et exécuter la méthode 
    // et gérer le cas où il n'y a pas de match.



    // Juste parce que c'est pratique, on va extraire le nom du controleur et j'appelle le nom de la méthode de l'action

    // 4# Exécution
    public function routeExe()
    {
        // si une correspondance n'est pas trouvée on envoie une page 404
        if ($this->match == null) {
            die('Page not found error 404');
        }

        // $controllerName = $this->match['target']['controller'];
        // $methodName = $this->match['target']['method'];

// l'utilisation de explode permet de scinder une chaine de caractere, ici on veut ce qu'il y a aavant et après le '#'.
        $parts = explode('#', $this->match['target']);

        $controllerName = $parts[0];
        $methodName = $parts[1];


        $controller = new $controllerName();


        $controller->$methodName($this->match['params']);// ici on récupèrent l'id qui sera utilisée dans les method des routeurs
    }

    //Tentative de lier le css dynamiquement
    public function url($relativePath) {
        //return ($_SERVER['PHP_SELF'].'/app'. $relativePath); Fonctionne à peu près!
        // return substr($_SERVER['PHP_SELF'].'/app'.$relativePath, 0, -1 * strlen('/index.php')); 
        return $_SERVER['BASE_URI'] . '/' .$relativePath;

        //ici je prend la base de l'url puis je lui concatene le '/' puis le chemin vers le css que j'indiqué dans le header
         
    } 
   
}
// Tout ce code est maintenant générique et je pourrais l'utiliser pour d'autre projet.