<?php

// Configurazioni del database
$dbHost = 'localhost';       // Indirizzo del server MySQL
$dbUsername = 'root';    // Nome utente del database
$dbPassword = '';    // Password del database
$dbName = 'php_esempi';    // Nome del database

// Connessione al database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

?>