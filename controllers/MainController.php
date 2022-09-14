<?php

/**
 * Cette classe a pour role de coordonner le point d'entrée (index.php) d'un côté, et la vue (template) de l'autre.
 * Au passage, il est possible de faire quelques vérifs ou même des "calculs" péparatoires pour la vue
 * - Récupérer des données auprès de la DB si besoin
 * - déterminer quelle view utiliser
 * - déclencher la création de le réponse avec tout ça
 */
class MainController
{
    // Ici, on gère l'inclusion des templates.
    public function show($template, $viewVars = [])
    {
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $template.'.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }

    // Gestion de page=store
    public function store()
    {
        // require_once __DIR__.'/views/store.tpl.php';
        $tplName = 'store';

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


        // Comme je vais appeler la méthode show ici, je peux utiliser $this plutot que $controller->show($tplName, $viewVars) ce qui donne:
        
        $this->show($tplName, $viewVars);
    }


    public function products() {
        $tplName = 'products';
        $this->show($tplName);
    }


    public function error404() {
        $tplName = '404';
        $this->show($tplName);
    }

    public function home() {
        $tplName = 'home';
        $this->show($tplName);
    }
}


  
// - View c'est le contenu visuel à renvoyer 
// - Controller c'est la mécanique concrète pour ce contenu au client