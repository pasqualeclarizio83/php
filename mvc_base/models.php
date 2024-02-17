<?php

// Creazione delle tabelle e attributi
$models = array(
    'User' => array('id' => 'int', 'username' => 'varchar(255)', 'email' => 'varchar(255)'),
    'Post' => array('id' => 'int', 'title' => 'varchar(255)', 'content' => 'text', 'user_id' => 'int'),
);

// Creazione delle tabelle nel database
foreach ($models as $tableName => $attributes) {
    $query = "CREATE TABLE IF NOT EXISTS $tableName (";
    foreach ($attributes as $attribute => $type) {
        $query .= "$attribute $type, ";
    }
    $query = rtrim($query, ', ') . ')';
    $connection->query($query);
}

?>
