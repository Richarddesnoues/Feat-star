<?php
require_once __DIR__.'/../vendor/autoload.php';

include 'kint.phar';

require_once __DIR__.'/../app/Router.php';


require_once __DIR__.'/../app/controllers/MainController.php'; 
 require_once __DIR__.'/../app/controllers/CartController.php';
// require_once __DIR__.'/../app/controllers/CatalogController.php';
// require_once __DIR__.'/../app/controllers/UserController.php';




$router = new Router(); // Initialisation

$router->declarationderoute('GET', '/', ['controller'=>'MainController', 'method'=> 'home']); // Déclaration
$router->declarationderoute('GET', '/cart', ['controller'=>'CartController', 'method'=> 'cart']); // Déclaration

$router->verificationdelurl();// Vérification

$router->executiondelaroute(); // Exécution
