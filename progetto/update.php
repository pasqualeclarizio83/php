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
    $user = $crud->readOne($id);

    // Rende l'intestazione
    $layout->renderHeader("Aggiorna Utente");

    // Gestisce l'invio del modulo
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fields = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email']
        ];
        if ($crud->update($fields, $id)) {
            echo "Utente aggiornato con successo!";
        } else {
            echo "Errore nell'aggiornamento dell'utente.";
        }
    }

    // Mostra il modulo
    $layout->renderForm($user, 'update.php?id=' . $id);

    // Rende il piè di pagina
    $layout->renderFooter();
} else {
    echo "ID non specificato.";
}
?>
