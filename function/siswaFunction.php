<?php

require_once('../inc/config.php');
function getSiswa(){
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT * FROM students");
    $siswa = [];
    while ($d = mysqli_fetch_assoc($data)) {
        $siswa[] = $d;
    }
    return $siswa;
}

function deleteSiswa($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "DELETE FROM students WHERE id = $id");
    return $data;
}

function addSiswa($nama, $nis, $kelas, $alamat)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "INSERT INTO students (name,nis,class,address) VALUES ('$nama','$nis','$kelas','$alamat')");
    return $data;
}

function updateSiswa($nama, $nis, $kelas, $alamat, $id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "UPDATE students SET name = '$nama', nis = '$nis', class = '$kelas', address = '$alamat' WHERE id = $id");
    return $data;
}

function getSiswaById($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT * FROM students WHERE id = $id");
    $siswa = mysqli_fetch_assoc($data);
    return $siswa;
}