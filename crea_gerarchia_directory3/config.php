<?php
// Connessione al database
$servername = "localhost";
$username = "pascal";
$password = "student";
$dbname = "direct";

// Crea la connessione al database
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}
?>