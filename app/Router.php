<?php

class Router
//pour chaque action je vais créer une fonction
{
    public $router;
    public $match;


    public function __construct() // 1# Initialisation
    {
        $this->router = new AltoRouter();

        $baseUrl = substr($_SERVER['PHP_SELF'], 0, -1 * strlen('/index.php'));
        $this->router->setBasePath($baseUrl);

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
        
    }





    // Je vais utiliser $match['target'] pour instencier le controleur et exécuter la méthode 
    // et gérer le cas où il n'y a pas de match.



    // Juste parce que c'est pratique, on va extraire le nom du controleur et j'appelle le nom de la méthode de l'action

    // 4# Exécution
    public function routeExe()
    {

        // $controllerName = $this->match['target']['controller'];
        // $methodName = $this->match['target']['method'];

// l'utilisation de explode permet de scinder une chaine de caractere, ici on veut ce qu'il y a aavant et après le '#'.
        $parts = explode('#', $this->match['target']);

        $controllerName = $parts[0];
        $methodName = $parts[1];


        $controller = new $controllerName();


        $controller->$methodName();
    }
}
// Tout ce code est maintenant générique et je pourrais l'utiliser pour d'autre projet.