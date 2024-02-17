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