<?php
// functions.php

function inserisciCliente($nome, $cognome, $email, $numeroTelefono) {
    global $conn;
    $sql = "INSERT INTO Clienti (Nome, Cognome, Email, NumeroTelefono) VALUES ('$nome', '$cognome', '$email', '$numeroTelefono')";
    return $conn->query($sql);
}

function ottieniClienti() {
    global $conn;
    $sql = "SELECT * FROM Clienti";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function ottieniClientePerID($clienteID) {
    global $conn;
    $sql = "SELECT * FROM Clienti WHERE ClienteID = $clienteID";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function aggiornaCliente($clienteID, $nome, $cognome, $email, $numeroTelefono) {
    global $conn;
    $sql = "UPDATE Clienti SET Nome='$nome', Cognome='$cognome', Email='$email', NumeroTelefono='$numeroTelefono' WHERE ClienteID=$clienteID";
    return $conn->query($sql);
}

function eliminaCliente($clienteID) {
    global $conn;
    $sql = "DELETE FROM Clienti WHERE ClienteID = $clienteID";
    return $conn->query($sql);
}

function chiudiConnessione() {
    global $conn;
    $conn->close();
}

// functions.php

function inserisciProdotto($nome, $descrizione, $prezzo) {
    global $conn;
    $sql = "INSERT INTO Prodotti (Nome, Descrizione, Prezzo) VALUES ('$nome', '$descrizione', $prezzo)";
    return $conn->query($sql);
}

function ottieniProdottiA() {
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
