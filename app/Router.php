<?php

class Router {
    public function __construct() 
    {
        $router = new AltoRouter();

        $baseUrl = substr($_SERVER['PHP_SELF'], 0, -1 * strlen('/index.php'));
        $router->setBasePath($baseUrl);
        
        

        $router->map('GET','/', ['controller' => 'MainController', 'method' => 'home']);
        $router->map('GET','/cart', ['controller' => 'CartController', 'method' => 'cart']);


        $match = $router->match();
        var_dump($router);
        var_dump($match);



         // Je vais utiliser $match['target'] pour instencier le controleur et exécuter la méthode 
        // et gérer le cas où il n'y a pas de match.



        // Juste parce que c'est pratique, on va extraire le nom du controleur et j'appelle le nom de la méthode de l'action

        $controllerName = $match['target']['controller'];
        $methodName = $match['target']['method'];


        $controller = new $controllerName();
        

        $controller->$methodName();
    }
}