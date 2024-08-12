<?php
error_reporting(0);

require_once ('../inc/config.php');
function addSchool($name, $regency)
{
    global $connectDb;
    //check if school already exist
    $check = mysqli_query($connectDb, "SELECT * FROM schools WHERE name = '$name'");
    if (mysqli_num_rows($check) > 0) {
        return "exist";
    }
    //insert school
    $data = mysqli_query($connectDb, "INSERT INTO schools (name, regency) VALUES ('$name', '$regency')");

    return $data;
}

function getSchool()
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT *, schools.name AS school_name FROM schools");
    $schools = [];
    while ($sch = mysqli_fetch_assoc($data)) {
        $student = mysqli_query($connectDb, "SELECT * FROM students WHERE school_id = " . $sch['id']);
        $students = [];
        while ($std = mysqli_fetch_assoc($student)) {
            $students[] = $std;
        }
        $schools[] = [
            'id' => $sch['id'],
            'school_name' => $sch['school_name'],
            'regency' => $sch['regency'],
            'students' => $students
        ];
    }
    return $schools;
}

function deleteSchool($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "DELETE FROM schools WHERE id = $id");
    return $data;
}

function getSchoolById($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT *, schools.name AS school_name FROM schools WHERE id = $id LIMIT 1");
    $sch = mysqli_fetch_assoc($data);
    $student = mysqli_query($connectDb, "SELECT * , devision.name as devision_name , students.name AS student_name FROM students LEFT JOIN devision ON devision.id = students.devision_id  WHERE school_id = " . $sch['id']);
    $students = [];
    while ($std = mysqli_fetch_assoc($student)) {
        $students[] = $std;
    }
    $schools = [
        'id' => $sch['id'],
        'school_name' => $sch['school_name'],
        'regency' => $sch['regency'],
        'students' => $students
    ];
    return $schools;
}

function updateSchool($id, $name, $regency)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "UPDATE schools SET name = '$name', regency = '$regency' WHERE id = $id");
    return $data;
}

function getSchoolByRegency($regency)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT * FROM schools WHERE regency = '$regency'");
    $schools = [];
    while ($d = mysqli_fetch_assoc($data)) {
        $schools[] = $d;
    }
    return $schools;
}