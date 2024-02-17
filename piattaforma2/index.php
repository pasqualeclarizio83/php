<?php

// Includi il file di configurazione del database
include('config.php');

// Connessione al database (esempio con MySQLi)
$conn = new mysqli($database_config['servername'], $database_config['username'], $database_config['password'], $database_config['dbname']);

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

// Template con CSS personalizzato
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo Sito</title>
    <style>
        /* Inserisci qui il tuo CSS personalizzato */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        main {
            margin: 20px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Il Tuo Sito</h1>
        <nav>
            <ul>
                <li><a href="/piattaforma2/home">Home</a></li>
                <li><a href="/piattaforma2/profilo/">Profilo</a></li>
                <li><a href="/piattaforma2/contatti/">Contatti</a></li>
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