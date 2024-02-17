<?php
include 'config.php';

// Verifica se sono stati inviati dati dal form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $nome = $_POST['nome'];
    $parent_directory_id = $_POST['parent_directory_id'];

    // Se il valore di parent_directory_id è una stringa vuota, imposta a NULL
    if ($parent_directory_id === '') {
        $parent_directory_id = 'NULL';
    }

    // Query per inserire la nuova directory
    $sql = "INSERT INTO Directory (nome, parent_directory_id) VALUES ('$nome', $parent_directory_id)";
    if ($conn->query($sql) === TRUE) {
        // Reindirizzamento a index.php dopo aver creato la directory
        header("Location: index.php");
        exit(); // Assicura che lo script venga terminato dopo il reindirizzamento
    } else {
        echo "Errore durante la creazione della directory: " . $conn->error;
    }
}
?>
