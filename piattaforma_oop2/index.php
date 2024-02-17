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
$controllerName = $endpoints[$requestedEndpoint] ?? 'DefaultController';

// Creazione di un'istanza del controller richiesto
$controller = new $controllerName($model);

// Esecuzione dell'azione richiesta
$action = $_GET['action'] ?? 'index';
$controller->$action();
?>
