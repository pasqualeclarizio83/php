<?php
// Includi il file di connessione al database
include('connessione.php');

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottieni i dati dal form di accesso
$email = $_POST['email'];
$password = $_POST['password'];

// Query per verificare le credenziali
$sql = "SELECT * FROM Utenti WHERE Email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Utente trovato, verifica la password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['Password'])) {
        echo "Accesso effettuato con successo!";
    } else {
        echo "Credenziali non valide!";
    }
} else {
    echo "Utente non trovato!";
}

$conn->close();
?>
