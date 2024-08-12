<?php
error_reporting(0);
require_once ('../inc/config.php');
function Login($username, $password, $role = 1)
{
    global $connectDb;

    $user = mysqli_query($connectDb, "SELECT * FROM admin WHERE username = '$username' LIMIT 1");
    if ($u = mysqli_fetch_assoc($user)) {
        if (password_verify($password, $u['password'])) {
            $_SESSION['user'] = $u;
            $_SESSION['role'] = 'administrator';
            return "admin";
        } else {
            return false;
        }
    } else {
        $siswa = mysqli_query($connectDb, "SELECT * FROM students WHERE username = '$username' LIMIT 1");
        if ($u = mysqli_fetch_assoc($siswa)) {
            if (password_verify($password, $u['password'])) {
                $_SESSION['user'] = $u;
                $_SESSION['role'] = 'siswa';
                return "student";
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

function Logout()
{
    session_destroy();
    header('Location: /');
}