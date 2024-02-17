<?php
// Bootstrap dell'applicazione
require_once 'config.php'; // Configurazioni e autoload delle classi
require_once 'router.php'; // Router per gestire le richieste
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MVC Example</title>
</head>
<body>
    <h1>Welcome to PHP MVC Example</h1>
    <?php
    // Gestisci la richiesta tramite il router
    handleRequest();
    ?>
</body>
</html>