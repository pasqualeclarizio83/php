<?php
// Router per gestire le richieste
function handleRequest() {
    $action = isset($_GET['action']) ? $_GET['action'] : 'default';

    switch ($action) {
        case 'getUserDetails':
            UserController::getUserDetails();
            break;
        default:
            echo "Default page content";
            break;
    }
}
?>
