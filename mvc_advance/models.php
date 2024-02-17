<?php

// Creazione di una tabella che descrive una persona
$connection->query("CREATE TABLE IF NOT EXISTS persons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    age INT
)");

?>
