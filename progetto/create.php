<?php
require_once 'Database.php';
require_once 'Crud.php';
require_once 'Layout.php';

// Configurazione
$db = new Database();
$conn = $db->getConnection();
$table = 'utenti';
$crud = new Crud($conn, $table);
$layout = new Layout();

// Rende l'intestazione
$layout->renderHeader("Crea Nuovo Utente");

// Gestisce l'invio del modulo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fields = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email']
    ];
    if ($crud->create($fields)) {
        echo "Utente creato con successo!";
    } else {
        echo "Errore nella creazione dell'utente.";
    }
}

// Mostra il modulo
$layout->renderForm(['nome' => '', 'email' => ''], 'create.php');

// Rende il piè di pagina
$layout->renderFooter();
?>
