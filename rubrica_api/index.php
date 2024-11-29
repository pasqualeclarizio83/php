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
