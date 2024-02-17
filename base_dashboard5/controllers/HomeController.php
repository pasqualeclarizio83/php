<?php

class HomeController {
    public function index() {
        $data = array('pageTitle' => 'Home');
        include 'views/home.php';
    }
}
?>