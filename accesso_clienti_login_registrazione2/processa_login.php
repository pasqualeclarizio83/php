<?php
include 'config.php';

// Ricezione dei dati dal modulo di login
$email = $_POST['email'];
$password = $_POST['password'];

// Preparazione e esecuzione della query per verificare le credenziali
$sql = "SELECT * FROM Utenti WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // L'utente è stato identificato con successo
    echo "Accesso effettuato con successo";
} else {
    // Credenziali non valide
    echo "Email o password non valide";
}

$conn->close();
?>
<?php
include 'config.php';

// Ricezione dei dati dal modulo di login
$email = $_POST['email'];
$password = $_POST['password'];

// Preparazione e esecuzione della query per verificare le credenziali
$sql = "SELECT * FROM Utenti WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // L'utente è stato identificato con successo
    echo "Accesso effettuato con successo";
} else {
    // Credenziali non valide
    echo "Email o password non valide";
}

$conn->close();
?>