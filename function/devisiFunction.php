<?php
error_reporting(0);
require_once ('../inc/config.php');

function getDevisi()
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT  *,students.id AS student_id, students.name AS student_name, devision.name AS devision_name, devision.id AS devision_id, COUNT(students.id) AS jumlah_student, students.id as student_id FROM devision LEFT JOIN students ON devision.head_on_devision = students.id GROUP BY devision.id");
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

function updateDevisi($id, $nama, $idHead)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "UPDATE devision SET name = '$nama', head_on_devision = '$idHead' WHERE id = $id");
    return $data;
}

function getDevisiById($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT * , devision.name AS devision_name, students.name as student_name, schools.name AS school_name FROM devision LEFT JOIN students ON students.devision_id = devision.id LEFT JOIN schools ON schools.id = students.school_id WHERE devision.id = $id");
    $getDevision = mysqli_fetch_assoc($data);

    $studentInDevision = [];
    while ($d = mysqli_fetch_assoc($data)) {
        $studentInDevision[] = $d;
    }
    $devisions = [
        'id' => $id,
        'name' => $getDevision['devision_name'],
        'students' => $studentInDevision,
        'head_on_devision' => $getDevision['head_on_devision']
    ];
    return $devisions;
}