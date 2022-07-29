<?php

/**
 * Cette classe a pour role d'orchestrer les choses dans l'application:
 * - Récupérer des données auprès de la DB si besoin
 * - déterminer quelle view utiliser
 * - déclencher la création de le réponse avec tout ça
 */
class MainController {

    // Ici, on gère l'inclusion des templates.
function show($template) {
    require_once __DIR__.'/views/header.tpl.php';
    require_once __DIR__.'/views/'.$template;
    require_once __DIR__.'/views/footer.tpl.php';
  }
  
}