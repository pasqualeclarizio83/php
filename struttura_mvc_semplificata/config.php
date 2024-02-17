<?php
// Configurazioni dell'applicazione e autoload delle classi
spl_autoload_register(function ($class) {
    include 'models/' . $class . '.class.php';
    include 'views/' . $class . '.class.php';
    include 'controllers/' . $class . '.class.php';
});
?>
