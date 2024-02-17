<?php

// Configurazioni dell'applicazione
$config = array(
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_password' => 'password',
    'db_name' => 'my_database',
);

// Bootstrap dell'applicazione
require_once 'config.php'; // Configurazioni e connessione al database
require_once 'models.php'; // Creazione delle tabelle e attributi
require_once 'functions.php'; // Creazione delle funzioni con il richiamo delle tabelle
require_once 'urls.php'; // Creazione degli endpoint e delle URL

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Django-Like Example</title>
</head>
<body>
    <h1>Welcome to PHP Django-Like Example</h1>
    <?php
    // Gestisci la richiesta tramite il router
    handleRequest();
    ?>
</body>
</html>