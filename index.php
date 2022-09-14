<?php
require_once __DIR__.'/controllers/MainController.php'; 




// index.php doit analyser la requête du client,
// notamment l'URL de la requête, pour choisir
// quel vue (== template) utiliser pour répondre.

// var_dump($_GET);
// var_dump(__DIR__);



// Il est possible (mais ce n'est pas sûr) que le template que je vais choisir ait 
// besoin de données pour faire l'affichage final.
// Je prépare un tableau de données, qui commence vide.
//$viewVars = []; Etant donné que j'ai déplacé la methode show(), je n'ai plus besoin des variables $viewvars et $tplname
$controller = new MainController();
//$tplName =''; // je crée une variable vide ou je vais mettre le template qui est appelé avec le méthode (par exemple)product().
//var_dump($tplName);




// On déclare nos différentes pages du site.
// On déclare nos routes.


$routes = [
    'error404' => [
        'controller' => 'MainController',
        'method' => 'error404',
    ],
    'balisage' => [
        'controller' => 'MainController',
        'method' => 'balisage',
        
    ],
    'cart' =>[
        'controller' => 'MainController',
        'method' => 'cart',
    ],
    'cgv'=>[
        'controller' => 'MainController',
        'method' => 'cgv',
    ],
    'contact' =>[
        'controller' => 'MainController',
        'method' => 'contact',
    ],
    'destockage'=>[
        'controller' => 'MainController',
        'method' => 'destockage',
    ],
    'gobelet'=>[
        'controller' => 'MainController',
        'method' => 'gobelet',
    ],
    'home'=>[
        'controller' => 'MainController',
        'method' => 'home',
    ],
    'materiel'=>[
        'controller' => 'MainController',
        'method' => 'materiel',
    ],
    'product'=>[
        'controller' => 'MainController',
        'method' => 'products',
    ],
    'user' =>[
        'controller' => 'MainController',
        'method' => 'user',
    ],
];



// On imagine par defaut que la page demandée est l'index

$requestedPage = 'home';

// Complément impératif pour utilisr les routes déclarées qui permet:

    // - rechercher si une clef correspond à la requête
    // - en déduire l'action (== controller + method)
    // - instancier le controller et appeler la method





if (isset($_GET['page'])) {
    $requestedPage = $_GET['page'];
}


// On part de principe que le client a demandé une page valide, on va donc chercher les informations  
// concernant cette page dans le tableau des routes => action
$action = $routes[$requestedPage];


// Juste parce que c'est pratique, on va extraire le nom du controleur et le nom de la méthode de l'action
$controllerName = $action['controller'];
$methodName = $action['method'];


// Une fois qu'on a rassemblé/déduit tout ça , on instancie le controleur désigné et on appelle la méthode désignée
$controller = new $controllerName();
$controller->$methodName();






// if (isset($_GET['page'])) {
//   // une page est explicitement demandée, cherchons si
//   // on la connaît.
//     if ($_GET['page'] === 'products') {
//     $controller->products();


//   } else if ($_GET['page'] === 'gobelet') {

//     $controller->gobelet();

//   } else if ($_GET['page'] === 'balisage') {

//     $controller->balisage();

//   } else if  ($_GET['page'] === 'materiel') {
    
//     $controller->materiel();

//   } else if ($_GET['page'] === 'destockage') {
    
//     $controller->destockage();

//   } else if ($_GET['page'] === 'contact') {

//     $controller->contact();

//   } else if ($_GET['page'] === 'user') {

//     $controller->user();


//   } else if ($_GET['page'] === 'cart') {
    
//     $controller->cart();


//   } else if ($_GET['page'] === 'cgv') {
   
//    $controller->cgv();


//   } 
//   // Aie ! la page demandée n'existe pas !
//   // Que faire ?
//   else {
//     // require_once __DIR__.'/views/404.tpl.php';
//    $controller->error404();
//   }
// } else {
//   // Par défaut, si pas de page explicitement demandée,
//   // on affiche la homepage.
//   // require_once __DIR__.'/views/home.tpl.php';
//   $controller->home();
// }





// TODO: me donner accès à la fonction show appelée plus bas dans ce fichier


 // Je vais appeler le méthode show dans le controller plutot qu'ici car ce n'est pas le role de index.php d'afficher les page mais celui du controller 
 //$controller->show($tplName, $viewVars);
