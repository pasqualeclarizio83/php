<?php

// Includi la configurazione del database
include('database_config.php');
include('database_schema.php');

// Connessione al database (esempio con MySQLi)
$conn = new mysqli($database_config['servername'], $database_config['username'], $database_config['password'], $database_config['dbname']);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Creazione delle tabelle del database basate sul modello ER
foreach ($database_schema as $table => $attributes) {
    $sql = "CREATE TABLE IF NOT EXISTS $table (";
    foreach ($attributes['columns'] as $column => $definition) {
        $sql .= "$column $definition, ";
    }
    $sql = rtrim($sql, ', ');
    $sql .= ")";
    
    if ($conn->query($sql) === FALSE) {
        echo "Errore nella creazione della tabella $table: " . $conn->error;
    }
}

// Includi le funzioni del progetto
include('functions.php');

// Includi la configurazione degli endpoints
include('endpoints_config.php');

// Analizza l'URL richiesto
$request_uri = $_SERVER['REQUEST_URI'];
$endpoint = $endpoints[$request_uri];

// Includi il file dell'endpoint richiesto e chiama la funzione associata
if (isset($endpoint) && file_exists($endpoint['file'])) {
    include($endpoint['file']);
    $function_name = $endpoint['function'];
    if (function_exists($function_name)) {
        $result = $function_name();
        // Gestisci i risultati come necessario
        // ...
    } else {
        echo "Funzione non trovata: $function_name";
    }
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
                <?php
                // Genera dinamicamente i link dell'interfaccia utente basati sugli endpoints configurati
                foreach ($endpoints as $url => $endpoint) {
                    echo "<li><a href=\"$url\">".ucfirst(substr($url, 1))."</a></li>";
                }
                ?>
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