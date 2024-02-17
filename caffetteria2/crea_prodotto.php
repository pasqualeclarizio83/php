<?php
// crea_prodotto.php

include_once 'configurazione.php';
include_once 'functions_prodotti.php';

// Gestione del form di inserimento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $prezzo = $_POST['prezzo'];

    // Inserisci un nuovo prodotto
    if (inserisciProdotto($nome, $descrizione, $prezzo)) {
        header("Location: prodotti.php"); // Redirect dopo l'inserimento
        exit();
    } else {
        echo "Errore durante l'inserimento del prodotto.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Prodotto</title>
</head>

<body>
    <h1>Crea Prodotto</h1>
    <form method="post" action="crea_prodotto.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="descrizione">Descrizione:</label>
        <input type="text" name="descrizione" required><br>

        <label for="prezzo">Prezzo:</label>
        <input type="text" name="prezzo" required><br>

        <input type="submit" value="Inserisci Prodotto">
    </form>
</body>

</html>