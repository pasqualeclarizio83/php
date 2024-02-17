<?php

// Includi la configurazione del database
include('database_config.php');

// Connessione al database (esempio con MySQLi)
$conn = new mysqli($database_config['servername'], $database_config['username'], $database_config['password'], $database_config['dbname']);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Includi le funzioni del progetto
include('functions.php');

// Includi la configurazione degli endpoints
include('endpoints_config.php');

// Analizza l'URL richiesto
$request_uri = $_SERVER['REQUEST_URI'];
$endpoint = $endpoints[$request_uri];

// Includi il file dell'endpoint richiesto
if (isset($endpoint)) {
    include($endpoint);
} else {
    // Endpoint non trovato, gestire l'errore
    echo "Endpoint non trovato";
}

// Chiusura della connessione al database
$conn->close();

// Puoi configurare il CSS, il template, ecc., qui
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo Sito</title>
    <style>
        <?php
        // Inserisci qui il tuo CSS personalizzato
        $custom_css = "
            body {
                font-family: 'Arial', sans-serif;
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
        ";

        echo $custom_css;
        ?>
    </style>
</head>
<body>
    <header>
        <h1>Il Tuo Sito</h1>
        <nav>
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/contact">Contact</a></li>
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