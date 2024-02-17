<?php
// configurazione.php

$servername = "localhost";
$username = "pascal";
$password = "student";
$database = "nome_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
