<?php
require_once 'config.php';
require_once 'db.php';
require_once 'Model.php';

// Connessione al database
$db = new Database();
$conn = $db->getConnection();

// Creazione di un'istanza del modello
$model = new Model($conn);

// Gestione degli endpoint
$requestedEndpoint = $_GET['endpoint'] ?? 'default';
$endpointConfig = $endpoints[$requestedEndpoint] ?? null;

if ($endpointConfig) {
    $controllerName = $endpointConfig['controller'] ?? 'DefaultController';

    // Creazione di un'istanza del controller richiesto
    $controller = new $controllerName($model);

    // Esecuzione dell'azione richiesta
    $action = $_GET['action'] ?? 'index';
    $actionConfig = $endpointConfig['actions'][$action] ?? null;

    if ($actionConfig) {
        // Eseguire l'azione e caricare il template
        call_user_func(array($controller, $action));
        include($actionConfig['template']);
    } else {
        // Azione non valida, gestisci l'errore o reindirizza altrove
        echo 'Azione non valida';
    }
} else {
    // Endpoint non valido, gestisci l'errore o reindirizza altrove
    echo 'Endpoint non valido';
}
?>