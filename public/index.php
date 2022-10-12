<?php
session_start();
require_once __DIR__.'/../vendor/autoload.php';



//include 'kint.phar';

// require_once __DIR__ .'/../app/models/Category.php';
// require_once __DIR__ .'/../app/models/Product.php';
// require_once __DIR__ .'/../app/models/Type.php';
// require_once __DIR__.'/../app/Router.php';
// require_once __DIR__.'/../app/Database.php';

// // On importe les controller requis.
// // Le CoreController doit être le premier à etre appellé pour savoir qui est le parent
// require_once __DIR__.'/../app/controllers/CoreController.php';
// require_once __DIR__.'/../app/controllers/MainController.php'; 
// require_once __DIR__.'/../app/controllers/CartController.php';
// require_once __DIR__.'/../app/controllers/CatalogController.php';
// require_once __DIR__.'/../app/controllers/UserController.php';

// On a plus besoin d'appeller nos controller ici car nous les avons mis dans l'autoload avec composer




$router = new App\Router(); // Initialisation

// $router->declarationderoute('GET', '/', ['controller'=>'MainController', 'method'=> 'home']); // Déclaration
// $router->declarationderoute('GET', '/cart', ['controller'=>'MainController', 'method'=> 'cart']); // Déclaration

// l'utilisation d'une chaine de caractere plutot qu'un tableau associatif est plus rapide à écrire

$router->map('GET', '/', 'App\Controllers\MainController#home', /*'main-home'*/); // Déclaration de route
$router->map('GET', '/panier', 'App\Controllers\CartController#cart'); // Déclaration de route


$router->map('GET', '/catalogue/categories', 'App\Controllers\CatalogController#categories');
$router->map('GET', '/catalogue/categorie/[i:id]', 'App\Controllers\CatalogController#category','catalogue-categorie');


$router->map('GET', '/catalogue/produit/[i:id]', 'App\Controllers\CatalogController#product',/*'catalog-product'*/);

$router->map('GET', '/account/login', 'App\Controllers\UserController#logUser');
$router->map('GET', '/account/register', 'App\Controllers\UserController#registerUser' );

$match = $router->match();// Vérification d'URL

//$dispatcher = new Dispatcher($match, 'App\Controllers\ErrorController::error404');

//$dispatcher->setControllersNamespace('App\Controllers');

//$dispatcher->dispatch();


$router->routeExe(); // Exécution de la route
