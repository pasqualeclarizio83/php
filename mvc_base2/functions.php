<?php

// Funzione con il richiamo della tabella
function getAllData() {
    global $connection;
    $result = $connection->query("SELECT * FROM my_table");
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>
