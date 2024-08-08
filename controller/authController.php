<?php
include '../function/AuthFunction.php';

if ($_GET['action'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (Login($username, $password) == 'admin') {
        header('Location: /dashboard');
    } else if (Login($username, $password) == 'student') {
        header('Location: /siswa');
    } else {
        header('Location: /');
    }
}
if ($_GET['action'] == 'logout') {
    Logout();
    header('Location: /');
}