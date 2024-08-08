<?php
require_once ('../inc/config.php');
require_once ('../function/siswaFunction.php');

$urlParams = $_GET['action'];

if ($urlParams == 'add') {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    addSiswa($nama, $nis, $kelas, $alamat);
} elseif ($urlParams == 'delete') {
    $id = $_GET['id'];
    deleteSiswa($id);
    header('Location: ../index.php?module=siswa');
} elseif ($urlParams == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    updateSiswa($nama, $nis, $kelas, $alamat, $id);
} elseif ($urlParams == 'edit') {
    $id = $_GET['id'];
    $data = mysqli_query($connectDb, "SELECT * FROM students WHERE id = $id");
    $siswa = mysqli_fetch_assoc($data);
    require_once ('../views/siswa/edit.php');
} elseif ($urlParams == 'add') {
    require_once ('../views/siswa/add.php');
} else {
    var_dump(getSiswa());
}