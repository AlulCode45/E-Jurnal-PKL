<?php

if (!$_SESSION['user']) {
    header('Location: /');
}


if (isset($_GET['status']) && isset($_GET['message'])) {
    $status = $_GET['status'];
    $message = $_GET['message'];
    echo "<script type='text/javascript'>
        alert('$message');
    </script>";
}