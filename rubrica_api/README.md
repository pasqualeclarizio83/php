## PHP RUBRICA API

### Se creassi un Database: db_rubrica

#### Tabella: rubrica

#### SQL

```
CREATE TABLE rubrica (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Identificatore univoco per ogni contatto
    nome VARCHAR(100) NOT NULL,                -- Nome del contatto
    cognome VARCHAR(100) NOT NULL,             -- Cognome del contatto
    telefono VARCHAR(15) NOT NULL,             -- Numero di telefono del contatto
    email VARCHAR(100),                        -- Email del contatto (opzionale)
    indirizzo VARCHAR(255),                    -- Indirizzo del contatto (opzionale)
    data_creazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Data e ora in cui il contatto è stato aggiunto
);

```

#### Dopo esserci accertati di aver creato la tabella e i rispettivi campi della Rubrica

### Creo: config.php

```
<?php
// config.php
$host = 'localhost';        // Il nome del server o IP
$dbname = 'db_rubrica';     // Nome del database
$username = 'root';         // Nome utente del database
$password = '';             // Password del database (modifica se necessario)

try {
    // Creazione della connessione PDO a MariaDB
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Imposta il modo di gestione degli errori su eccezioni
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Errore nella connessione al database: " . $e->getMessage());
}
?>

```

### Creo: index.php

```
<?php
// Importa la configurazione del database
require 'config.php';

// Imposta l'intestazione della risposta per restituire i dati in formato JSON
header('Content-Type: application/json');

try {
    // Esegui la query per selezionare tutti i contatti dalla tabella 'rubrica'
    $stmt = $pdo->query("SELECT * FROM rubrica");

    // Fetch dei risultati come array associativi
    $contatti = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Invia i dati in formato JSON
    echo json_encode([
        'status' => 'success',
        'data' => $contatti
    ]);

} catch (PDOException $e) {
    // Gestisci gli errori del database
    echo json_encode([
        'status' => 'error',
        'message' => 'Errore durante il recupero dei dati: ' . $e->getMessage()
    ]);
}
?>

```

#### La rispettiva immagine dell'API

[Immagine](https://raw.githubusercontent.com/pasqualeclarizio83/php/refs/heads/main/rubrica_api/API.bmp)