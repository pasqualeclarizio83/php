<?php
// Connessione al database
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "php_esempi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Gestione delle richieste GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Elencare tutte le città
    if (!isset($_GET['cap']) && !isset($_GET['NomeCitta'])) {
        $result = $conn->query("SELECT * FROM Citta");

        if ($result !== false && $result->num_rows > 0) {
            $cities = array();
            while ($row = $result->fetch_assoc()) {
                $cities[] = $row;
            }

            header('Content-Type: application/json');

            echo json_encode($cities);
        } else {

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Nessuna città trovata.'));
        }
    }
    // Cerca per CAP
    elseif (isset($_GET['cap'])) {
        $inputCap = $_GET['cap'];

        $result = $conn->query("SELECT * FROM Citta WHERE CAP = '$inputCap'");

        if ($result !== false && $result->num_rows > 0) {
            $cities = array();
            while ($row = $result->fetch_assoc()) {
                $cities[] = $row;
            }

            header('Content-Type: application/json');

            echo json_encode($cities);
        } else {

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Nessuna città trovata per il CAP specificato.'));
        }
    }
    // Cerca per NomeCitta
    elseif (isset($_GET['NomeCitta'])) {
        $inputNomeCitta = $_GET['NomeCitta'];

        $result = $conn->query("SELECT * FROM Citta WHERE NomeCitta = '$inputNomeCitta'");

        if ($result !== false && $result->num_rows > 0) {
            $cities = array();
            while ($row = $result->fetch_assoc()) {
                $cities[] = $row;
            }

            header('Content-Type: application/json');

            echo json_encode($cities);
        } else {

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Nessuna città trovata per il NomeCitta specificato.'));
        }
    }
}

// Chiudi la connessione al database
$conn->close();
?>