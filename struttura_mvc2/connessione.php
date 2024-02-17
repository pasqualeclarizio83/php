<?php
// Definisci le variabili per la connessione al database
$servername = "localhost";
$username = "pascal";
$password = "student";
$dbname = "nome_database";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>