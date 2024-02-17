<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'pascal');
define('DB_PASSWORD', 'student');
define('DB_NAME', 'prova');

$tables = array(
    'users' => array(
        'id' => 'int(11) NOT NULL AUTO_INCREMENT',
        'username' => 'varchar(255) NOT NULL',
        'email' => 'varchar(255) NOT NULL',
        // ... altri attributi
    ),
    // Aggiungi altre tabelle secondo necessità
);

$endpoints = array(
    'users' => 'UserController',
    // Aggiungi altri endpoint secondo necessità
);

$templates = array(
    'header' => 'templates/header.php',
    'footer' => 'templates/footer.php',
    'users_list' => 'templates/users_list.php',
    // Aggiungi altri template secondo necessità
);
?>