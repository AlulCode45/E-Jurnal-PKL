<?php
require_once ('../inc/config.php');
require_once ('../function/siswaFunction.php');

$urlParams = $_GET['action'];

if ($urlParams == 'add') {
    $name = $_POST['name'];
    $devision_id = $_POST['devision_id'];
    $school_id = $_POST['school_id'];
    $result = addStudent($name, $devision_id, $school_id);
    if ($result) {
        header('Location: /dashboard/kelola-siswa.php?status=success&message=Siswa add successfully');
    } else {
        header('Location: /dashboard/kelola-siswa.php?status=error&message=Failed to add siswa');
    }
} elseif ($urlParams == 'delete') {
    $id = $_GET['id'];
    $result = deleteStudent($id);
    if ($result) {
        header('Location: /dashboard/kelola-siswa.php?status=success&message=Siswa delete successfully');
    } else {
        header('Location: /dashboard/kelola-siswa.php?status=error&message=Failed to delete siswa');
    }
} elseif ($urlParams == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $devision_id = $_POST['devision_id'];
    $school_id = $_POST['school_id'];
    $result = updateStudent($name, $devision_id, $school_id, $id);
    if ($result) {
        header('Location: /dashboard/kelola-siswa.php?status=success&message=Siswa edit successfully');
    } else {
        header('Location: /dashboard/kelola-siswa.php?status=error&message=Failed to edit siswa');
    }
} elseif ($urlParams == 'get') {
    $data = getStudent();
    echo json_encode($data);
} elseif ($urlParams == 'getById') {
    $id = $_GET['id'];
    $data = getStudentById($id);
    echo json_encode($data);
} elseif ($urlParams == 'getByDevision') {
    $devision_id = $_GET['devision_id'];
    $data = getStudentByDevision($devision_id);
    echo json_encode($data);
} elseif ($urlParams == 'getBySchool') {
    $school_id = $_GET['school_id'];
    $data = getStudentBySchool($school_id);
    echo json_encode($data);
}