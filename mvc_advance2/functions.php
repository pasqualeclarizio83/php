<?php

// Funzioni CRUD per la tabella
function createPerson($firstName, $lastName, $dateOfBirth, $email, $phoneNumber) {
    global $connection;
    $stmt = $connection->prepare("INSERT INTO persons (first_name, last_name, date_of_birth, email, phone_number) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $dateOfBirth, $email, $phoneNumber);
    return $stmt->execute();
}

function readAllPersons() {
    global $connection;
    $result = $connection->query("SELECT * FROM persons");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updatePerson($id, $firstName, $lastName, $dateOfBirth, $email, $phoneNumber) {
    global $connection;
    $stmt = $connection->prepare("UPDATE persons SET first_name = ?, last_name = ?, date_of_birth = ?, email = ?, phone_number = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $firstName, $lastName, $dateOfBirth, $email, $phoneNumber, $id);
    return $stmt->execute();
}

function deletePerson($id) {
    global $connection;
    $stmt = $connection->prepare("DELETE FROM persons WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

?>
