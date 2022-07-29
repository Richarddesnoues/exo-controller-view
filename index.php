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
 


  // Il faut détecter quel jour on est , pour que le template store 
  // puisse le mettre en évidence.

  // On récupère le jour du jour, au format anglais
  $today = date("Y-m-d");

  // On extrait le numéro du jour dans la semaine .
  $dayNumber = date('N', strtotime($today));

  // On extrait le nom du jour du jour dans la semaine
  $todayName = array_keys($weekOpeningHours)[$dayNumber];


  // Ok, les données sont prêtes, on les transmets à la vue !
  $viewVars['weekOpeningHours'] = $weekOpeningHours;
  $viewVars['todayName'] = $todayName;



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
  show($tplName, $viewVars);
