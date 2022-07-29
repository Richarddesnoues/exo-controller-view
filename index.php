<?php



// index.php doit analyser la requête du client,
// notamment l'URL de la requête, pour choisir
// quel vue (== template) utiliser pour répondre.

// var_dump($_GET);
// var_dump(__DIR__);



// Il est possible (mais ce n'est pas sûr) que le template que je vais choisir ait 
// besoin de données pour faire l'affichage final.
// Je prépare un tableau de données, qui commence vide.
$viewVars = [];



if (isset($_GET['page'])) {
  // une page est explicitement demandée, cherchons si
  // on la connaît.
  if ($_GET['page'] === 'store') {
    // require_once __DIR__.'/views/store.tpl.php';
    $tplName = 'store.tpl.php';

     //...ici, je dois avoir accès à mon tableau de jours
  $weekOpeningHours = [
    'Sunday' => 'Closed',
    'Monday' => '7:00 AM to 8:00 PM',
    'Tuesday' => '7:00 AM to 8:00 PM',
    'Wednesday' => '7:00 AM to 8:00 PM',
    'Thursday' => '7:00 AM to 8:00 PM',
    'Friday' => '7:00 AM to 8:00 PM',
    'Saturday' => '9:00 AM to 5:00 PM'
  ];

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


// TODO: ici on avait accès à la fonction show
// Ici, on gère l'inclusion des templates.
function show($template, $viewVars = [])
{
 

  require_once __DIR__ . '/views/header.tpl.php';
  require_once __DIR__ . '/views/' . $template;
  require_once __DIR__ . '/views/footer.tpl.php';
}
  show($tplName, $weekOpeningHours);
