<?php
// config.php
$host = 'localhost';        // Il nome del server
$dbname = 'db_rubrica';     // Nome del database
$username = 'root';         // Nome utente del database
$password = 'student';             // Password del database

try {
    // Creazione della connessione PDO a MariaDB
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestione degli errori
} catch (PDOException $e) {
    die("Errore di connessione al database: " . $e->getMessage());
}
?>