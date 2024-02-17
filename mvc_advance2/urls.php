<?php

// Definizione degli endpoint per le operazioni CRUD
function handleRequest() {
    $action = isset($_GET['action']) ? $_GET['action'] : 'readAll';

    switch ($action) {
        case 'create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $dateOfBirth = $_POST['date_of_birth'];
                $email = $_POST['email'];
                $phoneNumber = $_POST['phone_number'];
                createPerson($firstName, $lastName, $dateOfBirth, $email, $phoneNumber);
            }
            $persons = readAllPersons();
            include 'template.html';
            break;

        case 'readAll':
            $persons = readAllPersons();
            include 'template.html';
            break;

        case 'edit':
            $editMode = true;
            $editedPersonId = isset($_GET['id']) ? $_GET['id'] : null;
            $editedPerson = null;

            if ($editedPersonId !== null) {
                $editedPerson = readPersonById($editedPersonId);
            }

            $persons = readAllPersons();
            include 'template.html';
            break;

        case 'update':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_GET['id'];
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $dateOfBirth = $_POST['date_of_birth'];
                $email = $_POST['email'];
                $phoneNumber = $_POST['phone_number'];
                updatePerson($id, $firstName, $lastName, $dateOfBirth, $email, $phoneNumber);
            }
            $persons = readAllPersons();
            include 'template.html';
            break;

        case 'delete':
            $idToDelete = isset($_GET['id']) ? $_GET['id'] : null;
            if ($idToDelete !== null) {
                deletePerson($idToDelete);
            }
            $persons = readAllPersons();
            include 'template.html';
            break;

        default:
            echo "Invalid action";
            break;
    }
}

// Funzione per leggere una persona per ID
function readPersonById($id) {
    global $connection;
    $stmt = $connection->prepare("SELECT * FROM persons WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

?>
