<?php
error_reporting(0);

require_once ('../inc/config.php');
require_once ('../function/sekolahFunction.php');

$urlParams = $_GET['action'];

if ($urlParams == 'add') {
    $name = $_POST['name'];
    $regency = $_POST['regency'];
    $result = addSchool($name, $regency);
    if ($result) {
        header('Location: /dashboard/kelola-sekolah.php?status=success&message=Sekolah berhasil ditambahkan');
    } else {
        header('Location: /dashboard/kelola-sekolah.php?status=error&message=Gagal menambahkan sekolah');
    }
} elseif ($urlParams == 'delete') {
    $id = $_GET['id'];
    echo "<script>
        var confirmDelete = confirm('Apakah Anda yakin ingin menghapus sekolah ini?');
        if (confirmDelete) {
            window.location.href = '/controller/schoolController.php?action=confirm_delete&id=$id';
        } else {
            window.location.href = '/dashboard/kelola-sekolah.php';
        }
    </script>";
} elseif ($urlParams == 'confirm_delete') {
    $id = $_GET['id'];
    $result = deleteSchool($id);
    if ($result) {
        header('Location: /dashboard/kelola-sekolah.php?status=success&message=Sekolah berhasil dihapus');
    } else {
        header('Location: /dashboard/kelola-sekolah.php?status=error&message=Gagal menghapus sekolah');
    }
} elseif ($urlParams == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $regency = $_POST['regency'];
    $result = updateSchool($id, $name, $regency);
    if ($result) {
        header('Location: /dashboard/kelola-sekolah.php?status=success&message=Sekolah berhasil diperbarui');
    } else {
        header('Location: /dashboard/kelola-sekolah.php?status=error&message=Gagal memperbarui sekolah');
    }
} elseif ($urlParams == 'get') {
    $data = getSchool();
    echo json_encode($data);
} elseif ($urlParams == 'getById') {
    $id = $_GET['id'];
    $data = getSchoolById($id);
    echo json_encode($data);
} elseif ($urlParams == 'getByRegency') {
    $regency = $_GET['regency'];
    $data = getSchoolByRegency($regency);
    echo json_encode($data);
}