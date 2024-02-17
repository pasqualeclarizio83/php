<?php

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
<html>
<head>
    <title>Dashboard</title>
    <style>
        /* Aggiungi eventuali stili CSS per la tua dashboard */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 15px;
        }
    </style>
</head>
<body>

    <nav>
        <a href="index.php?route=home">Home</a>
        <a href="index.php?route=contact">Contatti</a>
        <!-- Aggiungi altri link per le diverse sezioni della tua dashboard -->
    </nav>

    <!-- Il resto del tuo codice HTML potrebbe includere il contenuto della pagina selezionata -->

</body>
</html>