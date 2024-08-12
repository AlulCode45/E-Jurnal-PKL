<?php
error_reporting(0);
include '../function/AuthFunction.php';

if ($_GET['action'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (Login($username, $password) == 'admin') {
        header('Location: /dashboard');
        exit();
    } else if (Login($username, $password) == 'student') {
        header('Location: /siswa');
        exit();
    } else {
        header('Location: /');
        exit();
    }
}

if ($_GET['action'] == 'logout') {
    echo "<script>
        var confirmLogout = confirm('Are you sure you want to logout?');
        if (confirmLogout) {
            window.location.href = '/controller/authController.php?action=confirm_logout';
        } else {
            window.location.href = '/';
        }
    </script>";
}

if ($_GET['action'] == 'confirm_logout') {
    Logout();
    header('Location: /');
    exit();
}
?>