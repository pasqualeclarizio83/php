<?php
// modifica_cliente.php

include_once 'configurazione.php';
include_once 'functions.php';

if (isset($_GET['clienteID'])) {
    $clienteID = $_GET['clienteID'];
    $cliente = ottieniClientePerID($clienteID);
} else {
    // Reindirizza alla pagina principale se l'ID del cliente non è specificato
    header("Location: index.php");
    exit();
}

// Gestione della modifica del cliente
if (isset($_POST['modificaCliente'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $numeroTelefono = $_POST['numeroTelefono'];

    aggiornaCliente($clienteID, $nome, $cognome, $email, $numeroTelefono);
    header("Location: index.php"); // Redirect dopo l'aggiornamento
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Cliente</title>
</head>

<body>
    <h1>Modifica Cliente</h1>
    <form method="post" action="modifica_cliente.php?clienteID=<?php echo $clienteID; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $cliente['Nome']; ?>"><br>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" value="<?php echo $cliente['Cognome']; ?>"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $cliente['Email']; ?>"><br>

        <label for="numeroTelefono">Numero Telefono:</label>
        <input type="text" name="numeroTelefono" value="<?php echo $cliente['NumeroTelefono']; ?>"><br>

        <input type="submit" name="modificaCliente" value="Salva Modifiche">
    </form>
</body>

</html>