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
// $viewVars = []; je n'ai plus besoin des variables $viewvars et $tplname suite au déplacement de la method show dans le maincontroller
$controller = new MainController();
//$tplName = ''; // je crée une variable vide






// On déclare nos différentes pages du site.
// On déclare nos routes.

  $routes = [
    'home' => [
      'controller' => 'MainController',
      'method' => 'home'
    ],

    'products' => [
      'controller' => 'MainController',
      'method' => 'products',
    ],

    'store' => [
      'controller' => 'MainController',
      'method' => 'store',
    ],

    '404'=> [
      'controller' => 'MainController',
      'method' => '404'
    ]

  ];

  // On imagine que par defaut, la page demandée est l'index
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
//   if ($_GET['page'] === 'store') {
   
// // TODO: appeler la méthode store() du controller
//   $controller->store();

//   } else if ($_GET['page'] === 'products') {
//     // require_once __DIR__.'/views/products.tpl.php';
//     $tplName = 'products.tpl.php';
//   }
//   // Aie ! la page demandée n'existe pas !
//   // Que faire ?
//   else {
//     // require_once __DIR__.'/views/404.tpl.php';
//     $tplName = '404.tpl.php';
//   }
// } else {
//   // Par défaut, si pas de page explicitement demandée,
//   // on affiche la homepage.
//   // require_once __DIR__.'/views/home.tpl.php';
//   $tplName = 'home.tpl.php';
// }


// TODO: me donner accès à la fonction show appelée plus bas dans ce fichier

// Je vais apeler le méthode show dans le controller plutot qu'ici car ce n'est pas le role de index.php d'afficher les page mais celui du controller 
  // $controller->show($tplName, $viewVars);
