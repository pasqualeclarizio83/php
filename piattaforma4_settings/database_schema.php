<?php

// Creazione del modello del database
$database_schema = array(
    'utenti' => array(
        'id' => 'INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
        'nome' => 'VARCHAR(30) NOT NULL',
        'cognome' => 'VARCHAR(30) NOT NULL',
        'email' => 'VARCHAR(50)',
        'reg_date' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
    ),
    // Aggiungi altre tabelle e attributi secondo necessità
);

?>
