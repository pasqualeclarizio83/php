<?php
// modifica_ordine.php

include_once 'configurazione.php';
include_once 'functions_ordini.php';

if (isset($_GET['ordineID'])) {
    $ordineID = $_GET['ordineID'];
    $ordine = ottieniOrdinePerID($ordineID);
} else {
    // Reindirizza alla pagina principale se l'ID dell'ordine non è specificato
    header("Location: ordini.php");
    exit();
}

// Gestione della modifica dell'ordine
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clienteID = $_POST['clienteID'];
    $dataOrdine = $_POST['dataOrdine'];

    aggiornaOrdine($ordineID, $clienteID, $dataOrdine);
    header("Location: ordini.php"); // Redirect dopo l'aggiornamento
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Ordine</title>
</head>

<body>
    <h1>Modifica Ordine</h1>
    <form method="post" action="modifica_ordine.php?ordineID=<?php echo $ordineID; ?>">
        <label for="clienteID">ID Cliente:</label>
        <input type="text" name="clienteID" value="<?php echo $ordine['ClienteID']; ?>" required><br>

        <label for="dataOrdine">Data Ordine:</label>
        <input type="text" name="dataOrdine" value="<?php echo $ordine['DataOrdine']; ?>" required><br>

        <input type="submit" value="Salva Modifiche">
    </form>
</body>

</html>