<?php
// Definisci le variabili per la connessione al database
$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "db_utenti";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>