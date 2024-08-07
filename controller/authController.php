<?php
include '../function/AuthFunction.php';

if ($_GET['action'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (Login($username, $password)) {
        header('Location: /dashboard');
    } else {
        header('Location: /');
    }
}
if ($_GET['action'] == 'logout') {
    Logout();
    header('Location: /');
}
