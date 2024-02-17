<?php

// Includi il file di configurazione e le funzioni ausiliarie se necessario
// include 'config.php';
// include 'functions.php';

$route = isset($_GET['route']) ? $_GET['route'] : 'home';

$controllerPath = 'controllers/' . ucfirst($route) . 'Controller.php';

if (file_exists($controllerPath)) {
    include $controllerPath;
    $controllerClass = ucfirst($route) . 'Controller';
    $controller = new $controllerClass();
    $controller->index();
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="index.php?route=home">Home</a></li>
                <li><a href="index.php?route=contact">Contatti</a></li>
                <!-- Aggiungi altri link per le diverse sezioni della tua dashboard -->
            </ul>
        </div>
        <div class="content">
            <?php
                // Include il contenuto specifico della pagina solo se il route è 'contact'
                if ($route == 'contact') {
                    include 'views/contact.php';
                } else {
                    // Se non è 'contact', puoi includere un messaggio o altro contenuto predefinito
                    echo '<h2>Benvenuto nella Dashboard</h2>';
                }
            ?>
        </div>
    </div>

</body>
</html>