<?php
// Vista dell'utente
class UserView {
    public static function showUserDetails($user) {
        echo "Username: " . $user->username;
    }
}
?>
