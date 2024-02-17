<?php

// Configurazioni dell'applicazione
require_once 'config.php'; // Configurazioni e connessione al database

// Bootstrap dell'applicazione
require_once 'models.php'; // Creazione della tabella
require_once 'functions.php'; // Funzioni con il richiamo della tabella
require_once 'urls.php'; // Definizione degli endpoint

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