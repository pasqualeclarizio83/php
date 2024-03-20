<?php
include 'config.php';

// Ricezione dei dati dal modulo di registrazione
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];

// Preparazione e esecuzione della query per inserire i dati nel database
$sql = "INSERT INTO Utenti (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registrazione completata con successo";
} else {
    echo "Errore durante la registrazione: " . $conn->error;
}

$conn->close();
?>
