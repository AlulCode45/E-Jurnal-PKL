<?php

require_once ('../inc/config.php');


function addStudent($name, $devision_id, $school_id, $username, $password)
{
    global $connectDb;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $data = mysqli_query($connectDb, "INSERT INTO students (name, devision_id, school_id, username, password) VALUES ('$name', '$devision_id', '$school_id','$username' ,'$password')");
    return $data;
}

function getStudent()
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT *, students.name AS student_name, schools.name AS school_name, students.id as id FROM students LEFT JOIN devision ON devision.id = students.devision_id LEFT JOIN schools ON schools.id = students.school_id");
    $students = [];
    while ($std = mysqli_fetch_assoc($data)) {
        $students[] = $std;
    }
    return $students;
}

function deleteStudent($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "DELETE FROM students WHERE id = $id");
    return $data;
}

function getStudentById($id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT *, students.name AS student_name FROM students WHERE id = $id LIMIT 1");
    $std = mysqli_fetch_assoc($data);
    return $std;
}

function updateStudent($name, $devision_id, $school_id, $id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "UPDATE students SET name = '$name', devision_id = '$devision_id', school_id = '$school_id' WHERE id = $id");
    return $data;
}

function getStudentByDevision($devision_id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT *, students.name AS student_name FROM students WHERE devision_id = $devision_id");
    $students = [];
    while ($std = mysqli_fetch_assoc($data)) {
        $students[] = $std;
    }
    return $students;
}

function getStudentBySchool($school_id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT *, students.name AS student_name FROM students WHERE school_id = $school_id");
    $students = [];
    while ($std = mysqli_fetch_assoc($data)) {
        $students[] = $std;
    }
    return $students;
}

function getStudentByDevisionAndSchool($devision_id, $school_id)
{
    global $connectDb;
    $data = mysqli_query($connectDb, "SELECT *, students.name AS student_name FROM students WHERE devision_id = $devision_id AND school_id = $school_id");
    $students = [];
    while ($std = mysqli_fetch_assoc($data)) {
        $students[] = $std;
    }
    return $students;
}