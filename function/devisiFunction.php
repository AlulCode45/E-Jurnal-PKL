<?php
require_once('../inc/config.php');

function getDevisi()
{
    global $connectDb;
    $data  = mysqli_query($connectDb, "SELECT  *,students.id AS student_id, students.name AS student_name, devision.name AS devision_name, COUNT(students.id) AS jumlah_student FROM devision INNER JOIN students ON devision.head_on_devision = students.id GROUP BY devision.id");
    $devisi = [];
    while ($d = mysqli_fetch_assoc($data)) {
        $devisi[] = $d;
    }
    return $devisi;
}
function deleteDevisi($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "DELETE FROM devision WHERE id = $id");
    return $data;
}

function addDevisi($nama, $idHead)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "INSERT INTO devision (name,head_on_devision) VALUES ('$nama','$idHead')");
    return $data;
}

function updateDevisi($nama, $idHead, $id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "UPDATE devision SET name = '$nama', head_on_devision = '$idHead' WHERE id = $id");
    return $data;
}

function getDevisiById($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT * FROM devision WHERE id = $id");
    $devisi = mysqli_fetch_assoc($data);
    return $devisi;
}