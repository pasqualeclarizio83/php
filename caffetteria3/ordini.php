<?php
// ordini.php

include_once 'configurazione.php';
include_once 'functions_ordini.php';

// Esempio di utilizzo delle funzioni per gli ordini
$listaOrdini = ottieniOrdini();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Ordini</title>
</head>

<body>
    <h1>Lista Ordini</h1>
    <table border="1">
        <tr>
            <th>ID Ordine</th>
            <th>ID Cliente</th>
            <th>Data Ordine</th>
            <th>Azioni</th>
        </tr>
        <?php foreach ($listaOrdini as $ordine) : ?>
            <tr>
                <td><?php echo $ordine['OrdineID']; ?></td>
                <td><?php echo $ordine['ClienteID']; ?></td>
                <td><?php echo $ordine['DataOrdine']; ?></td>
                <td>
                    <!-- Modifica Ordine -->
                    <a href="modifica_ordine.php?ordineID=<?php echo $ordine['OrdineID']; ?>">Modifica</a>

                    <!-- Elimina Ordine -->
                    <a href="elimina_ordine.php?ordineID=<?php echo $ordine['OrdineID']; ?>">Elimina</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <!-- Aggiungi un link per creare un nuovo ordine -->
    <a href="crea_ordine.php">Crea Nuovo Ordine</a>

    <?php chiudiConnessione(); ?>
</body>

</html>