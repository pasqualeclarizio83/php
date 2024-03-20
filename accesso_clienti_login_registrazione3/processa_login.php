<?php
include 'config.php';

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
        echo "Accesso effettuato con successo";
        // Puoi fare il redirect alla pagina successiva
        // Esegui il login dell'utente, ad esempio impostando una sessione
        // E poi reindirizza alla dashboard o a una pagina di benvenuto
    } else {
        echo "Credenziali non valide";
        // Redirect a login.php se le credenziali non sono valide
        header("Location: login.php");
        exit();
    }
} else {
    echo "Utente non trovato";
    // Redirect a login.php se l'utente non è presente nel database
    header("Location: login.php");
    exit();
}

$conn->close();
?>