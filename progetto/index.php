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
$layout->renderHeader("Lista Utenti");

// Ottiene i dati dalla tabella
$utenti = $crud->read();

// Visualizza i dati nella tabella
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Azioni</th>
        </tr>";

// Itera sugli utenti e mostra le righe della tabella
foreach ($utenti as $utente) {
    echo "<tr>
            <td>{$utente['id']}</td>
            <td>{$utente['nome']}</td>
            <td>{$utente['email']}</td>
            <td>
                <a href='update.php?id={$utente['id']}'>Modifica</a> | 
                <a href='delete.php?id={$utente['id']}'>Cancella</a>
            </td>
          </tr>";
}

echo "</table>";

// Rende il piè di pagina
$layout->renderFooter();
?>