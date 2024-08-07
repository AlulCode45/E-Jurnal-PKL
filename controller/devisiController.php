<?php
$urlParams = $_GET['action'];

if ($urlParams == 'add') {
    include '../function/devisiFunction.php';
    $nama = $_POST['nama'];
    $idHead = $_POST['idHead'];
    addDevisi($nama, $idHead);
    header('Location: /dashboard/kelola-devisi.php');
} else if ($urlParams == 'delete') {
    include '../function/devisiFunction.php';
    $id = $_GET['id'];
    deleteDevisi($id);
    header('Location: /dashboard/kelola-devisi.php');
} else if ($urlParams == 'edit') {
    include '../function/devisiFunction.php';
    $id = $_GET['id'];
    $devisi = getDevisiById($id);
    include '../views/devisi/edit.php';
} else if ($urlParams == 'update') {
    include '../function/devisiFunction.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $idHead = $_POST['idHead'];
    updateDevisi($id, $nama, $idHead);
    header('Location: /dashboard/kelola-devisi.php');
} else {
    include '../function/devisiFunction.php';
    $devisi = getDevisi();
    include '../dashboard/kelola-devisi.php';
}