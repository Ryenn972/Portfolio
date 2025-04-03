<?php

namespace Controllers;

class HomeController{
    
    public function display(){
        
        // De quoi j'ai besoin ? (des données)
        $userRepo = new \Repositories\UserRepository();
        $user = $userRepo->getUserByEmail('ryenn.mith-catan@3wacademy.fr');
        
        $projectRepo = new \Repositories\ProjectRepository();
        $projectsArray = $projectRepo->getAllProjects();
        
        // Où vais-je l'afficher ? 
        $template = 'home';
        require 'views/layout.phtml';
    }
}