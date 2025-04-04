<?php

namespace Controllers;

class DashboardController {
    
    public function display() {
        session_start();
        
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?route=login');
            exit;
        }
        
        $userRepo = new \Repositories\UserRepository();
        $user = $userRepo->getUserByEmail('ryenn.mith-catan@3wacademy.fr');
        
        $template = 'dashboard';
        require 'views/layout.phtml';
    }
}