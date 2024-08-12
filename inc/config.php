<?php
error_reporting(0);
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'jurnal_magang';

$connectDb = mysqli_connect($host, $user, $password, $db);
