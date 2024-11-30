## PHP RUBRICA
### GESTIRE UNA RUBRICA ATTRAVERSO API

#### Per creare un sistema completo di Rubrica con le API REST per la gestione di contatti (utilizzando PHP), ti fornirò i file necessari per gestire le operazioni CRUD (Create, Read, Update, Delete) attraverso le seguenti API:

####    GET: Legge i contatti dalla rubrica.
####    POST: Aggiunge un nuovo contatto.
####    PUT: Aggiorna un contatto esistente.
####    DELETE: Elimina un contatto.

#### Struttura dei file:

####    config.php: Configurazione del database.
####    api.php: Gestione delle API REST per le operazioni CRUD

#### config.php

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

#### api.php
#### Sarà il controller che gestirà tutte le richieste API di tipo GET, POST, PUT e DELETE

```
<?php
// Importa la configurazione del database
require 'config.php';

// Imposta l'intestazione della risposta per restituire i dati in formato JSON
header('Content-Type: application/json');

// Ottieni il metodo HTTP (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Ottieni il parametro id dall'URL (se presente)
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($method) {
    case 'GET':
        getContacts($pdo, $id);
        break;
    case 'POST':
        createContact($pdo);
        break;
    case 'PUT':
        updateContact($pdo, $id);
        break;
    case 'DELETE':
        deleteContact($pdo, $id);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Metodo non supportato']);
        break;
}

// Funzione per ottenere i contatti
function getContacts($pdo, $id = null) {
    try {
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM rubrica WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $contact = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode(['status' => 'success', 'data' => $contact]);
        } else {
            $stmt = $pdo->query("SELECT * FROM rubrica");
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(['status' => 'success', 'data' => $contacts]);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

// Funzione per creare un nuovo contatto
function createContact($pdo) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['nome']) || !isset($data['cognome']) || !isset($data['telefono'])) {
        echo json_encode(['status' => 'error', 'message' => 'Dati mancanti']);
        return;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO rubrica (nome, cognome, telefono, email, indirizzo) VALUES (:nome, :cognome, :telefono, :email, :indirizzo)");
        $stmt->execute([
            'nome' => $data['nome'],
            'cognome' => $data['cognome'],
            'telefono' => $data['telefono'],
            'email' => isset($data['email']) ? $data['email'] : null,
            'indirizzo' => isset($data['indirizzo']) ? $data['indirizzo'] : null,
        ]);
        echo json_encode(['status' => 'success', 'message' => 'Contatto creato con successo']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

// Funzione per aggiornare un contatto esistente
function updateContact($pdo, $id) {
    if (!$id) {
        echo json_encode(['status' => 'error', 'message' => 'ID mancante']);
        return;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    try {
        $stmt = $pdo->prepare("UPDATE rubrica SET nome = :nome, cognome = :cognome, telefono = :telefono, email = :email, indirizzo = :indirizzo WHERE id = :id");
        $stmt->execute([
            'nome' => $data['nome'],
            'cognome' => $data['cognome'],
            'telefono' => $data['telefono'],
            'email' => isset($data['email']) ? $data['email'] : null,
            'indirizzo' => isset($data['indirizzo']) ? $data['indirizzo'] : null,
            'id' => $id
        ]);
        echo json_encode(['status' => 'success', 'message' => 'Contatto aggiornato con successo']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

// Funzione per eliminare un contatto
function deleteContact($pdo, $id) {
    if (!$id) {
        echo json_encode(['status' => 'error', 'message' => 'ID mancante']);
        return;
    }

    try {
        $stmt = $pdo->prepare("DELETE FROM rubrica WHERE id = :id");
        $stmt->execute(['id' => $id]);
        echo json_encode(['status' => 'success', 'message' => 'Contatto eliminato con successo']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>

```

#### Accedendo: http://127.0.0.1/sistema_rubrica_api/api.php

#### La rispettiva immagine dell'API

[Install](https://github.com/pasqualeclarizio83/php/blob/main/sistema_rubrica_api/INSTALL.png)

[Register](https://github.com/pasqualeclarizio83/php/blob/main/sistema_rubrica_api/contatti.png)

[GET](https://github.com/pasqualeclarizio83/php/blob/main/sistema_rubrica_api/GET.png)

[POST](https://github.com/pasqualeclarizio83/php/blob/main/sistema_rubrica_api/POST_1.png)