<?php
// prodotti.php

include_once 'configurazione.php';
include_once 'functions_prodotti.php';

// Esempio di utilizzo delle funzioni per i prodotti
$listaProdotti = ottieniProdotti();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Prodotti</title>
</head>

<body>
    <h1>Lista Prodotti</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Prezzo</th>
            <th>Azioni</th>
        </tr>
        <?php foreach ($listaProdotti as $prodotto) : ?>
            <tr>
                <td><?php echo $prodotto['ProdottoID']; ?></td>
                <td><?php echo $prodotto['Nome']; ?></td>
                <td><?php echo $prodotto['Descrizione']; ?></td>
                <td><?php echo $prodotto['Prezzo']; ?></td>
                <td>
                    <!-- Modifica Prodotto -->
                    <a href="modifica_prodotto.php?prodottoID=<?php echo $prodotto['ProdottoID']; ?>">Modifica</a>

                    <!-- Elimina Prodotto -->
                    <a href="elimina_prodotto.php?prodottoID=<?php echo $prodotto['ProdottoID']; ?>">Elimina</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <!-- Aggiungi un link per creare un nuovo prodotto -->
    <a href="crea_prodotto.php">Crea Nuovo Prodotto</a>

    <?php chiudiConnessione(); ?>
</body>

</html>