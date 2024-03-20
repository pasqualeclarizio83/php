<?php
$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "gestione_prova";

// Connessione al database
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>