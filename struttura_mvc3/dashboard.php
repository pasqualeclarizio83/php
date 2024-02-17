<?php
// Includi il file di connessione al database
include('connessione.php');

// Verifica se l'utente è autenticato
session_start();

if (!isset($_SESSION['id_utente'])) {
    // Se l'utente non è autenticato, reindirizza alla pagina di accesso
    header("Location: login.html");
    exit();
}

// Ottieni l'ID dell'utente autenticato dalla sessione
$id_utente = $_SESSION['id_utente'];

// Query per ottenere le informazioni del profilo dell'utente autenticato
$sql = "SELECT * FROM Utenti WHERE ID = '$id_utente'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Utente trovato, visualizza le informazioni del profilo
    $row = $result->fetch_assoc();
    echo "Benvenuto, " . $row['Nome'] . " " . $row['Cognome'] . "!<br>";
    echo "Email: " . $row['Email'];

    // Aggiungi il link per effettuare il logout
    echo "<br><a href='logout.php'>Logout</a>";
} else {
    echo "Errore nel recupero delle informazioni del profilo.";
}

// Chiudi la connessione
$conn->close();
?>