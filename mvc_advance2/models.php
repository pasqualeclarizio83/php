<?php

// Creazione di una tabella che descrive una persona
$connection->query("CREATE TABLE IF NOT EXISTS persons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    date_of_birth DATE,
    email VARCHAR(100),
    phone_number VARCHAR(20)
)");

?>
