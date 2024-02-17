<?php
// modifica_prodotto.php

include_once 'configurazione.php';
include_once 'functions_prodotti.php';

if (isset($_GET['prodottoID'])) {
    $prodottoID = $_GET['prodottoID'];
    $prodotto = ottieniProdottoPerID($prodottoID);
} else {
    // Reindirizza alla pagina principale se l'ID del prodotto non è specificato
    header("Location: prodotti.php");
    exit();
}

// Gestione della modifica del prodotto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $prezzo = $_POST['prezzo'];

    aggiornaProdotto($prodottoID, $nome, $descrizione, $prezzo);
    header("Location: prodotti.php"); // Redirect dopo l'aggiornamento
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Prodotto</title>
</head>

<body>
    <h1>Modifica Prodotto</h1>
    <form method="post" action="modifica_prodotto.php?prodottoID=<?php echo $prodottoID; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $prodotto['Nome']; ?>" required><br>

        <label for="descrizione">Descrizione:</label>
        <input type="text" name="descrizione" value="<?php echo $prodotto['Descrizione']; ?>" required><br>

        <label for="prezzo">Prezzo:</label>
        <input type="text" name="prezzo" value="<?php echo $prodotto['Prezzo']; ?>" required><br>

        <input type="submit" value="Salva Modifiche">
    </form>
</body>

</html>