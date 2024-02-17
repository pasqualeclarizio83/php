<?php

// Configurazioni dell'applicazione
$config = array(
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_password' => 'password',
    'db_name' => 'my_database',
);

// Connessione al database
$connection = new mysqli($config['db_host'], $config['db_user'], $config['db_password'], $config['db_name']);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>
