<?php
// functions.php

function inserisciOrdine($clienteID, $dataOrdine) {
    global $conn;
    $sql = "INSERT INTO Ordini (ClienteID, DataOrdine) VALUES ($clienteID, '$dataOrdine')";
    return $conn->query($sql);
}

function ottieniOrdini() {
    global $conn;
    $sql = "SELECT * FROM Ordini";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function ottieniOrdinePerID($ordineID) {
    global $conn;
    $sql = "SELECT * FROM Ordini WHERE OrdineID = $ordineID";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function aggiornaOrdine($ordineID, $clienteID, $dataOrdine) {
    global $conn;
    $sql = "UPDATE Ordini SET ClienteID=$clienteID, DataOrdine='$dataOrdine' WHERE OrdineID=$ordineID";
    return $conn->query($sql);
}

function eliminaOrdine($ordineID) {
    global $conn;
    $sql = "DELETE FROM Ordini WHERE OrdineID = $ordineID";
    return $conn->query($sql);
}
?>
