<?php
include 'config.php';
session_start(); // Inizia la sessione per accedere alle variabili di sessione

// Ricezione dei dati dal modulo di login
$email = $_POST['email'];
$password = $_POST['password'];

// Preparazione della query per ottenere la password hash associata all'email
$sql = "SELECT id, password FROM Utenti WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Estrai la riga risultante
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $password_hash = $row["password"];
    
    // Verifica se la password hash corrisponde alla password inserita dall'utente
    if (password_verify($password, $password_hash)) {
        // Login riuscito, memorizza l'id utente nella sessione
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;

        // Reindirizza l'utente alla pagina del profilo dopo 5 secondi
        header("Refresh: 5; URL=profilo_utente.php");
        echo "Accesso effettuato con successo. Verrai reindirizzato alla tua pagina del profilo...";
        exit();
    } else {
        echo "Credenziali non valide";
        // Redirect a login.php se le credenziali non sono valide
        header("Refresh: 5; URL=login.php");
        exit();
    }
} else {
    echo "Utente non trovato";
    // Redirect a login.php se l'utente non è presente nel database
    header("Refresh: 5; URL=login.php");
    exit();
}

$conn->close();
?>
