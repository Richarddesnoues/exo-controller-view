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


if (isset($_GET['page'])) {
  // une page est explicitement demandée, cherchons si
  // on la connaît.
  if ($_GET['page'] === 'store') {
   
// TODO: appeler la méthode store() du controller
  $controller->store();

  } else if ($_GET['page'] === 'products') {
    // require_once __DIR__.'/views/products.tpl.php';
    $tplName = 'products.tpl.php';
  }
  // Aie ! la page demandée n'existe pas !
  // Que faire ?
  else {
    // require_once __DIR__.'/views/404.tpl.php';
    $tplName = '404.tpl.php';
  }
} else {
  // Par défaut, si pas de page explicitement demandée,
  // on affiche la homepage.
  // require_once __DIR__.'/views/home.tpl.php';
  $tplName = 'home.tpl.php';
}


// TODO: me donner accès à la fonction show appelée plus bas dans ce fichier


  $controller->show($tplName, $viewVars);
