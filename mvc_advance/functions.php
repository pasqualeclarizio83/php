<?php

// Funzioni CRUD per la tabella
function createPerson($firstName, $lastName, $age) {
    global $connection;
    $stmt = $connection->prepare("INSERT INTO persons (first_name, last_name, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $firstName, $lastName, $age);
    return $stmt->execute();
}

function readAllPersons() {
    global $connection;
    $result = $connection->query("SELECT * FROM persons");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updatePerson($id, $firstName, $lastName, $age) {
    global $connection;
    $stmt = $connection->prepare("UPDATE persons SET first_name = ?, last_name = ?, age = ? WHERE id = ?");
    $stmt->bind_param("ssii", $firstName, $lastName, $age, $id);
    return $stmt->execute();
}

function deletePerson($id) {
    global $connection;
    $stmt = $connection->prepare("DELETE FROM persons WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

?>
