<?php
$urlParams = $_GET['action'];

include '../function/devisiFunction.php'; // Include the function file at the beginning

if ($urlParams == 'add') {
    $nama = $_POST['nama'];
    $idHead = $_POST['idHead'];
    $result = addDevisi($nama, $idHead);
    if ($result) {
        header('Location: /dashboard/kelola-devisi.php?status=success&message=Devisi added successfully');
    } else {
        header('Location: /dashboard/kelola-devisi.php?status=error&message=Failed to add devisi');
    }
} else if ($urlParams == 'delete') {
    $id = $_GET['id'];
    $result = deleteDevisi($id);
    if ($result) {
        header('Location: /dashboard/kelola-devisi.php?status=success&message=Devisi deleted successfully');
    } else {
        header('Location: /dashboard/kelola-devisi.php?status=error&message=Failed to delete devisi');
    }
} else if ($urlParams == 'edit') {
    $id = $_GET['id'];
    $devisi = getDevisiById($id);
    include '../views/devisi/edit.php';
} else if ($urlParams == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $idHead = $_POST['idHead'];
    $result = updateDevisi($id, $nama, $idHead);
    if ($result) {
        header('Location: /dashboard/kelola-devisi.php?status=success&message=Devisi updated successfully');
    } else {
        header('Location: /dashboard/kelola-devisi.php?status=error&message=Failed to update devisi');
    }
} else {
    $devisi = getDevisi();
    include '../dashboard/kelola-devisi.php';
}