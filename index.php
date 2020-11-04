<?php

$toto = 'salut';

// index.php doit analyser la requête du client,
// notamment l'URL de la requête, pour choisir
// quel vue (== template) utiliser pour répondre.

// var_dump($_GET);
// var_dump(__DIR__);

if (isset($_GET['page'])) {
  // une page est explicitement demandée, cherchons si
  // on la connaît.
  if ($_GET['page'] === 'store') {
    // require_once __DIR__.'/views/store.tpl.php';
    $tplName = 'store.tpl.php';

  } else if ($_GET['page'] === 'products') {
    // require_once __DIR__.'/views/products.tpl.php';
    $tplName = 'products.tpl.php';
  }
  // Aie ! la page demandée n'existe en fait pas !
  // Que faire.
  else {
    // require_once __DIR__.'/views/404.tpl.php';
    $tplName = '404.tpl.php';
  }

} else {
  // Par défaut, si pas de page explicitement demandée,
  // on affiche la homepage.
  // require_once __DIR__.'/views/index.tpl.php';
  $tplName = 'index.tpl.php';
}

// Ici, on gère l'inclusion des templates.
function show($template) {
  require_once __DIR__.'/views/header.tpl.php';
  require_once __DIR__.'/views/'.$template;
  require_once __DIR__.'/views/footer.tpl.php';
}

show($tplName);