<?php
// Configurazione del database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'pascal');
define('DB_PASSWORD', 'student');
define('DB_NAME', 'prova');

// Configurazione delle tabelle e attributi
$tables = array(
    'users' => array(
        'id' => 'int(11) NOT NULL AUTO_INCREMENT',
        'username' => 'varchar(255) NOT NULL',
        'email' => 'varchar(255) NOT NULL',
        // ... altri attributi
    ),
    // Aggiungi altre tabelle secondo necessità
);

// Configurazione degli endpoint
$endpoints = array(
    'users' => 'UserController',
    // Aggiungi altri endpoint secondo necessità
);

// Configurazione dei template e della struttura HTML
$templates = array(
    'header' => 'templates/header.php',
    'footer' => 'templates/footer.php',
    // Aggiungi altri template secondo necessità
);
?>
