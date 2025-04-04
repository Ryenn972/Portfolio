<?php

namespace Controllers;

class LoginController {
    
    public function display() {
        $userRepo = new \Repositories\UserRepository();
        $user = $userRepo->getUserByEmail('ryenn.mith-catan@3wacademy.fr');
        
        $template = 'login';
        require 'views/layout.phtml';
    }
    
    public function login() {
        session_start();
        
        $adminEmail = 'ryenn.mith-catan@3wacademy.fr';
        $adminPassword = 'R01s02k07!';
        
        if (!isset($_POST['email'], $_POST['password'])) {
            header('Location: index.php?route=login&error1');
            exit;
        }
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if ($email === $adminEmail && $password === $adminPassword) {
            $_SESSION['user'] = ['email' => $adminEmail];
            header('Location: index.php?route=dashboard');
            exit;
        } else {
            header('Location: index.php?route=login&error2');
            exit;
        }
    }
}