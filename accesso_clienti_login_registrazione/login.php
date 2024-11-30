<?php
// Includi il file di connessione al database
include('connessione.php');

// Avvia la sessione
session_start();

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
        // Credenziali valide, salva l'ID dell'utente nella sessione
        $_SESSION['id_utente'] = $row['ID'];

        // Reindirizza alla dashboard.php
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Credenziali non valide!";
    }
} else {
    echo "Utente non trovato!";
}

// Chiudi la connessione
$conn->close();
?>
