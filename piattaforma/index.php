<?php

// Connessione al database (esempio con MySQLi)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "nome_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Definizione del modello del database (esempio con una tabella "utenti")
$sql = "CREATE TABLE IF NOT EXISTS utenti (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    echo "Errore nella creazione della tabella: " . $conn->error;
}

// Chiusura della connessione al database
$conn->close();

// Definizione degli URL e degli endpoint
$urls = array(
    "/home" => "home_endpoint.php",
    "/profilo" => "profilo_endpoint.php",
    "/contatti" => "contatti_endpoint.php"
);

// Analizza l'URL richiesto
$request_uri = $_SERVER['REQUEST_URI'];
$endpoint = $urls[$request_uri];

// Includi il file dell'endpoint richiesto
if (isset($endpoint)) {
    include($endpoint);
} else {
    // Endpoint non trovato, gestire l'errore
    echo "Endpoint non trovato";
}

// Template di base
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo Sito</title>
</head>
<body>
    <header>
        <h1>Il Tuo Sito</h1>
        <nav>
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/profilo">Profilo</a></li>
                <li><a href="/contatti">Contatti</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <!-- Il contenuto dinamico verrà inserito qui -->
    </main>
    
    <footer>
        <p>© <?php echo date("Y"); ?> Il Tuo Sito. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>