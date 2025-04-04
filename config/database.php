<?php

function getConnexion():object
{
    $pdo = new PDO('mysql:host=;port=;dbname=;charset=', '', '');
    
    return $pdo;
}
