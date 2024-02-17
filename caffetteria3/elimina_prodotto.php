<?php
// elimina_prodotto.php

include_once 'configurazione.php';
include_once 'functions_prodotti.php';

if (isset($_GET['prodottoID'])) {
    $prodottoID = $_GET['prodottoID'];
    eliminaProdotto($prodottoID);
}

// Reindirizza alla pagina principale
header("Location: prodotti.php");
exit();
?>
