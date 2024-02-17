<?php

// Creazione degli endpoint e delle URL
function handleRequest() {
    $action = isset($_GET['action']) ? $_GET['action'] : 'default';

    switch ($action) {
        case 'getAllUsers':
            $users = getAllUsers();
            echo json_encode($users);
            break;
        case 'getPostsByUserId':
            $userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;
            if ($userId !== null) {
                $posts = getPostsByUserId($userId);
                echo json_encode($posts);
            } else {
                echo "User ID is required.";
            }
            break;
        default:
            echo "Default page content";
            break;
    }
}

?>
