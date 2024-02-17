<?php
// crea_cliente.php

include_once 'configurazione.php';
include_once 'functions.php';

// Gestione del form di inserimento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $numeroTelefono = $_POST['numeroTelefono'];

    // Inserisci un nuovo cliente
    if (inserisciCliente($nome, $cognome, $email, $numeroTelefono)) {
        header("Location: index.php"); // Redirect dopo l'inserimento
        exit();
    } else {
        echo "Errore durante l'inserimento del cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Cliente</title>
</head>

<body>
    <h1>Crea Cliente</h1>
    <form method="post" action="crea_cliente.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" required><br>

        <label for="email">Email:</label>
        <input type="text" name="email" required><br>

        <label for="numeroTelefono">Numero Telefono:</label>
        <input type="text" name="numeroTelefono" required><br>

        <input type="submit" value="Inserisci Cliente">
    </form>
</body>

</html>