<?php
include 'config.php';

// Ricezione dei dati dal modulo di registrazione
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];

// Cripta la password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Preparazione e esecuzione della query per inserire i dati nel database
$sql = "INSERT INTO Utenti (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password_hash')";

if ($conn->query($sql) === TRUE) {
    echo "Registrazione completata con successo";
    // Redirect a login.php dopo la registrazione
    // Redirect a login.php dopo 5 secondi
    header("refresh:5;url=login.php");
    exit();
} else {
    echo "Errore durante la registrazione: " . $conn->error;
}

$conn->close();
?>