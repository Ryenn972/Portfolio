<?php

// Remplacer par un autoloader qui gère les namespaces
require 'config/database.php';

spl_autoload_register(function ($class) {
    
    require str_replace('\\', '/', lcfirst($class)).'.php';
    
});

// Conditions pour le routing

// 1. Tester la route transmise par le navigateur
// index.php?route=login

// Si le paramètre route existe alors on le teste pour savoir quelle page afficher
if(isset($_GET['route'])){
    switch($_GET['route']){
        case 'login':
            $controller = new Controllers\LoginController();
            $controller->display();
            break;
        
        case 'project_details':
            $controller = new Controllers\ProjectDetailsController();
            $controller->display();
            break;
                
        default:
            // Gérer la 404
            // $controller = new Controllers\ErrorController();
            // $controller->display();
            // break:
    }
}
// Sinon on va sur la page d'accueil
else {
    $controller = new Controllers\HomeController();
    $controller->display();
}