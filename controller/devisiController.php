<?php
error_reporting(0);
$urlParams = $_GET['action'];

include '../function/devisiFunction.php'; // Include the function file at the beginning

if ($urlParams == 'add') {
    $nama = $_POST['nama'];
    $idHead = $_POST['idHead'];
    $result = addDevisi($nama, $idHead);
    if ($result === "exist") {
        header('Location: /dashboard/kelola-devisi.php?status=error&message=Devisi already exist');
    } else if ($result === true) {
        header('Location: /dashboard/kelola-devisi.php?status=success&message=Devisi added successfully');
    } else {
        header('Location: /dashboard/kelola-devisi.php?status=error&message=Failed to add devisi');
    }
} else if ($urlParams == 'delete') {
    $id = $_GET['id'];
    echo "<script>
        var confirmDelete = confirm('Are you sure you want to delete this devisi?');
        if (confirmDelete) {
            window.location.href = '/controller/devisiController.php?action=confirm_delete&id=$id';
        } else {
            window.location.href = '/dashboard/kelola-devisi.php';
        }
    </script>";
} else if ($urlParams == 'confirm_delete') {
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