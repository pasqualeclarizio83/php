<?php
// Includi il file di connessione al database
include('connessione.php');

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottieni i dati dal form di registrazione
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash della password

// Query per l'inserimento dei dati nel database
$sql = "INSERT INTO Utenti (Nome, Cognome, Email, Password) VALUES ('$nome', '$cognome', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registrazione avvenuta con successo!";
} else {
    echo "Errore durante la registrazione: " . $conn->error;
}

$conn->close();
?>
