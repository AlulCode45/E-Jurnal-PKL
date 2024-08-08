<?php


require_once ('../inc/config.php');
require_once ('../function/sekolahFunction.php');

$urlParams = $_GET['action'];

if ($urlParams == 'add') {
    $name = $_POST['name'];
    $regency = $_POST['regency'];
    $result = addSchool($name, $regency);
    if ($result) {
        header('Location: /dashboard/kelola-sekolah.php?status=success&message=Sekolah add successfully');
    } else {
        header('Location: /dashboard/kelola-sekolah.php?status=error&message=Failed to add sekolah');
    }
} elseif ($urlParams == 'delete') {
    $id = $_GET['id'];
    $result = deleteSchool($id);
    if ($result) {
        header('Location: /dashboard/kelola-sekolah.php?status=success&message=Sekolah delete successfully');
    } else {
        header('Location: /dashboard/kelola-sekolah.php?status=error&message=Failed to delete sekolah');
    }
} elseif ($urlParams == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $regency = $_POST['regency'];
    $result = updateSchool($id, $name, $regency);
    if ($result) {
        header('Location: /dashboard/kelola-sekolah.php?status=success&message=Sekolah edit successfully');
    } else {
        header('Location: /dashboard/kelola-sekolah.php?status=error&message=Failed to edit sekolah');
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