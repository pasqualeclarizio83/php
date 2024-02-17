<?php

// Creazione di una tabella semplice
$connection->query("CREATE TABLE IF NOT EXISTS my_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    age INT
)");

?>
