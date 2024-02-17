<?php

// Definizione degli endpoint
function handleRequest() {
    $action = isset($_GET['action']) ? $_GET['action'] : 'default';

    switch ($action) {
        case 'getData':
            $data = getAllData();
            include 'template.html';
            break;
        default:
            echo "Default page content";
            break;
    }
}

?>
