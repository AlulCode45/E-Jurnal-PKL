<?php
error_reporting(0);

if (!$_SESSION['user'] || $_SESSION['role'] != 'administrator') {
    header('Location: /');
}


if (isset($_GET['status']) && isset($_GET['message'])) {
    $status = $_GET['status'];
    $message = $_GET['message'];
    echo "<script type='text/javascript'>
        alert('$message');
    </script>";
}