<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $directory_id = $_POST['directory_id'];

    // Verifica se la directory ha sotto-directory
    $sql = "SELECT * FROM Directory WHERE parent_directory_id = $directory_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Se ci sono sotto-directory, potresti voler gestire l'eliminazione in modo appropriato.
        // Per questo esempio, non è consentita l'eliminazione di una directory con sotto-directory.
        echo "Impossibile eliminare la directory poiché contiene sotto-directory.";
    } else {
        // Se non ci sono sotto-directory, esegui l'eliminazione della directory
        $sql = "DELETE FROM Directory WHERE directory_id = $directory_id";
        if ($conn->query($sql) === TRUE) {
            echo "Directory eliminata con successo.";
		header("Location: index.php");
            exit();
        } else {
            echo "Errore durante l'eliminazione della directory: " . $conn->error;
        }
    }
}
?>

