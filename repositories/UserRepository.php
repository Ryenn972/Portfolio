<?php

namespace Repositories;

class UserRepository {
    
    // public function getUserByEmail(string $email):array{
    //     $pdo = getConnexion();
    //     $query = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    //     $query->execute([$email]);
        
    //     return $query->fetch();
    // }
    
    public function getUserByEmail(string $email):\Models\User{
        $pdo = getConnexion();
        $query = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        // Transformer les données en classe Model User
        $user = new \Models\User();
        $user->sanitize($query->fetch());
        return $user;
    }
    
    public function check (string $email):void{
        
    }
}