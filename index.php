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
$viewVars = [];
$controller = new MainController();
$tplName =""; // je crée une variable vide









if (isset($_GET['page'])) {
  // une page est explicitement demandée, cherchons si
  // on la connaît.
    if ($_GET['page'] === 'products') {
    $controller->products();


  } else if ($_GET['page'] === 'gobelet') {

    $controller->gobelet();

  } else if ($_GET['page'] === 'balisage') {

    $controller->balisage();

  } else if  ($_GET['page'] === 'materiel') {
    
    $controller->materiel();

  } else if ($_GET['page'] === 'destockage') {
    
    $controller->destockage();

  } else if ($_GET['page'] === 'contact') {

    $controller->contact();

  } else if ($_GET['page'] === 'user') {

    $controller->user();


  } else if ($_GET['page'] === 'cart') {
    
    $controller->cart();


  } else if ($_GET['page'] === 'cgv') {
   
   $controller->cgv();


  } 
  // Aie ! la page demandée n'existe pas !
  // Que faire ?
  else {
    // require_once __DIR__.'/views/404.tpl.php';
   $controller->error404();
  }
} else {
  // Par défaut, si pas de page explicitement demandée,
  // on affiche la homepage.
  // require_once __DIR__.'/views/home.tpl.php';
  $controller->home();
}





// TODO: me donner accès à la fonction show appelée plus bas dans ce fichier


 // Je vais apeler le méthode show dans le controller plutot qu'ici car ce n'est pas le role de index.php d'afficher les page mais celui du controller 
 //$controller->show($tplName, $viewVars);
