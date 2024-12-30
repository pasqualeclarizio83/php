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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($crud->delete($id)) {
        echo "Utente eliminato con successo!";
    } else {
        echo "Errore nell'eliminazione dell'utente.";
    }
}

header('Location: index.php');
?>
