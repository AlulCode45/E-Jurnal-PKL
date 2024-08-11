<?php
require_once ('../inc/config.php');
require_once ('../function/siswaFunction.php');

$urlParams = $_GET['action'];

if ($urlParams == 'add') {
    $name = $_POST['nama'];
    $devision_id = $_POST['devision_id'];
    $school_id = $_POST['school_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = addStudent($name, $devision_id, $school_id, $username, $password);
    if ($result) {
        header('Location: /dashboard/kelola-siswa.php?status=success&message=Siswa berhasil ditambahkan');
    } else {
        header('Location: /dashboard/kelola-siswa.php?status=error&message=Gagal menambahkan siswa');
    }
} elseif ($urlParams == 'delete') {
    $id = $_GET['id'];
    echo "<script>
        var confirmDelete = confirm('Apakah Anda yakin ingin menghapus siswa ini?');
        if (confirmDelete) {
            window.location.href = '/controller/siswaController.php?action=confirm_delete&id=$id';
        } else {
            window.location.href = '/dashboard/kelola-siswa.php';
        }
    </script>";
} elseif ($urlParams == 'confirm_delete') {
    $id = $_GET['id'];
    $result = deleteStudent($id);
    if ($result) {
        header('Location: /dashboard/kelola-siswa.php?status=success&message=Siswa berhasil dihapus');
    } else {
        header('Location: /dashboard/kelola-siswa.php?status=error&message=Gagal menghapus siswa');
    }
} elseif ($urlParams == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $devision_id = $_POST['devision_id'];
    $school_id = $_POST['school_id'];
    $result = updateStudent($name, $devision_id, $school_id, $id);
    if ($result) {
        header('Location: /dashboard/kelola-siswa.php?status=success&message=Siswa berhasil diperbarui');
    } else {
        header('Location: /dashboard/kelola-siswa.php?status=error&message=Gagal memperbarui siswa');
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