<?php
// config.php
$host = 'localhost';        // Il nome del server o IP
$dbname = 'db_rubrica';     // Nome del database
$username = 'root';         // Nome utente del database
$password = '';             // Password del database (modifica se necessario)

try {
    // Creazione della connessione PDO a MariaDB
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Imposta il modo di gestione degli errori su eccezioni
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Errore nella connessione al database: " . $e->getMessage());
}
?>