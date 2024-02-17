<?php
// index.php

include_once 'configurazione.php';
include_once 'functions.php';

// Ottieni tutti i clienti
$listaClienti = ottieniClienti();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clienti</title>
</head>

<body>
    <h1>Lista Clienti</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Email</th>
            <th>Numero Telefono</th>
            <th>Azioni</th>
        </tr>
        <?php foreach ($listaClienti as $cliente) : ?>
            <tr>
                <td><?php echo $cliente['ClienteID']; ?></td>
                <td><?php echo $cliente['Nome']; ?></td>
                <td><?php echo $cliente['Cognome']; ?></td>
                <td><?php echo $cliente['Email']; ?></td>
                <td><?php echo $cliente['NumeroTelefono']; ?></td>
                <td>
                    <!-- Modifica Cliente -->
                    <a href="modifica_cliente.php?clienteID=<?php echo $cliente['ClienteID']; ?>">Modifica</a>

                    <!-- Elimina Cliente -->
                    <a href="elimina_cliente.php?clienteID=<?php echo $cliente['ClienteID']; ?>">Elimina</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Aggiungi un link per creare un nuovo cliente -->
    <a href="crea_cliente.php">Crea Nuovo Cliente</a>
</body>

</html>