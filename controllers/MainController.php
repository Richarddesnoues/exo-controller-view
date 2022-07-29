<?php

/**
 * Cette classe a pour role de coordonner le point d'entrée (index.php) d'un côté, et la vue (template) de l'autre.
 * Au passage, il est possible de faire quelques vérifs ou même des "calculs" péparatoires pour la vue
 * - Récupérer des données auprès de la DB si besoin
 * - déterminer quelle view utiliser
 * - déclencher la création de le réponse avec tout ça
 */
class MainController {
// Ici, on gère l'inclusion des templates.
    public function show($template, $viewVars = [])
    {
      require_once __DIR__ . '/../views/header.tpl.php';
      require_once __DIR__ . '/../views/' . $template;
      require_once __DIR__ . '/../views/footer.tpl.php';
    }
  }


  
// - View c'est le contenu visuel à renvoyer 
// - Controller c'est la mécanique concrète pour ce contenu au client