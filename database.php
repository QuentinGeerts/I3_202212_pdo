<?php

/**
 * DSN : Data Source Name
 * Informations requises pour la connexion à la base de données 
 */

$host      = "localhost";
$dbname    = "i3_pdo";
$charset   = "utf8"; // Pas obligatoire

/**
 * Paramètres de connexion à la base de données
 */

$dsn        = "mysql:host=$host;dbname=$dbname;charset=$charset";
$username   = "root";
$password   = "";

/**
 * Tentative de connexion
 * Fonction → Connexion réussie
 * Rate → Exception déclenchée et attrape par le "catch" puis on traite
 */

// xampp = http://localhost/phpmyadmin/
// mamp  = http://localhost/phpMyAdmin/

$state = false;

try {
    $pdo = new PDO($dsn, $username, $password);
    $state = true;
} catch (PDOException $exception) {
    echo "<p>Erreur : {$exception->getMessage()}</p>";
}

echo "État de la connexion : " . ($state ? "Connecté" : "Déconnecté");
