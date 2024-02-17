<?php
// functions.php

function inserisciProdotto($nome, $descrizione, $prezzo) {
    global $conn;
    $sql = "INSERT INTO Prodotti (Nome, Descrizione, Prezzo) VALUES ('$nome', '$descrizione', $prezzo)";
    return $conn->query($sql);
}

function ottieniProdotti() {
    global $conn;
    $sql = "SELECT * FROM Prodotti";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function ottieniProdottoPerID($prodottoID) {
    global $conn;
    $sql = "SELECT * FROM Prodotti WHERE ProdottoID = $prodottoID";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function aggiornaProdotto($prodottoID, $nome, $descrizione, $prezzo) {
    global $conn;
    $sql = "UPDATE Prodotti SET Nome='$nome', Descrizione='$descrizione', Prezzo=$prezzo WHERE ProdottoID=$prodottoID";
    return $conn->query($sql);
}

function eliminaProdotto($prodottoID) {
    global $conn;
    $sql = "DELETE FROM Prodotti WHERE ProdottoID = $prodottoID";
    return $conn->query($sql);
}

function chiudiConnessione() {
    global $conn;
    $conn->close();
}
?>
