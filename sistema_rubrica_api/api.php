<?php
// Importa la configurazione del database
require 'config.php';

// Imposta l'intestazione della risposta per restituire i dati in formato JSON
header('Content-Type: application/json');

// Ottieni il metodo HTTP (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Ottieni il parametro id dall'URL (se presente)
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Debug: Mostra il metodo e l'ID ricevuti
error_log("Metodo: $method");
error_log("ID: $id");

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