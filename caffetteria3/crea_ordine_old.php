<?php
// crea_ordine.php

include_once 'configurazione.php';
include_once 'functions.php';

// Gestione del form di inserimento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clienteID = $_POST['clienteID'];
    $dataOrdine = $_POST['dataOrdine'];

    // Inserisci un nuovo ordine
    if (inserisciOrdine($clienteID, $dataOrdine)) {
        header("Location: ordini.php"); // Redirect dopo l'inserimento
        exit();
    } else {
        echo "Errore durante l'inserimento dell'ordine.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Ordine</title>
</head>

<body>
    <h1>Crea Ordine</h1>
    <form method="post" action="crea_ordine.php">
        <label for="clienteID">ID Cliente:</label>
        <input type="text" name="clienteID" required><br>

        <label for="dataOrdine">Data Ordine:</label>
        <input type="text" name="dataOrdine" required><br>

        <input type="submit" value="Inserisci Ordine">
    </form>
</body>

</html>