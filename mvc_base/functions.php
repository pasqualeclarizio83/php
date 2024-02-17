<?php

// Creazione delle funzioni con il richiamo delle tabelle
function getAllUsers() {
    global $connection;
    $result = $connection->query("SELECT * FROM User");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getPostsByUserId($userId) {
    global $connection;
    $result = $connection->query("SELECT * FROM Post WHERE user_id = $userId");
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>
