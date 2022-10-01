<?php
require_once __DIR__.'/../vendor/autoload.php';

//include 'kint.phar';

require_once __DIR__ .'/../app/models/Category.php';
require_once __DIR__ .'/../app/models/Product.php';
require_once __DIR__ .'/../app/models/Type.php';
require_once __DIR__.'/../app/Router.php';
require_once __DIR__.'/../app/Database.php';

require_once __DIR__.'/../app/controllers/MainController.php'; 
 require_once __DIR__.'/../app/controllers/CartController.php';
 require_once __DIR__.'/../app/controllers/CatalogController.php';
// require_once __DIR__.'/../app/controllers/UserController.php';




$router = new Router(); // Initialisation

// $router->declarationderoute('GET', '/', ['controller'=>'MainController', 'method'=> 'home']); // Déclaration
// $router->declarationderoute('GET', '/cart', ['controller'=>'MainController', 'method'=> 'cart']); // Déclaration

// l'utilisation d'une chaine de caractere plutot qu'un tableau associatif est plus rapide à écrire

$router->map('GET', '/', 'MainController#home'); // Déclaration de route
$router->map('GET', '/panier', 'CartController#cart'); // Déclaration de route
$router->map('GET', '/catalogue/categorie/[i:id]', 'CatalogController#category');
$router->map('GET', '/catalogue/produit/[i:id]', 'CatalogController#product');
//$router->map('GET', '/catalogue/categorie/[i:id]', 'CatalogController#balisage');

$router->match();// Vérification d'URL


$router->routeExe(); // Exécution de la route
