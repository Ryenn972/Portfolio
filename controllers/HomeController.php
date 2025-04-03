<?php

namespace Controllers;

class HomeController{
    
    public function display(){
        
        // De quoi j'ai besoin ? (des données)
        $repo = new \Repositories\UserRepository();
        $user = $repo->getUserByEmail('ryenn.mith-catan@3wacademy.fr');
        
        // Où vais-je l'afficher ? 
        $template = 'home';
        require 'views/layout.phtml';
    }
}