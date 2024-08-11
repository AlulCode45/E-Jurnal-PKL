<?php
require_once ('../inc/config.php');
function addJournal($student_id, $job, $note, $date)
{
    global $connectDb;
    $query = "INSERT INTO journal (student_id, job, note, date) VALUES ('$student_id', '$job', '$note', '$date')";
    $result = mysqli_query($connectDb, $query);
    return $result;
}

function getJournal()
{
    global $connectDb;
    $query = "SELECT *, students.name as student_name, devision.name as devision_name, journal.id as id FROM journal LEFT JOIN students ON journal.student_id = students.id LEFT JOIN devision ON students.devision_id = devision.id";
    $query = mysqli_query($connectDb, $query);
    $journalData = [];
    while ($d = mysqli_fetch_assoc($query)) {
        $journalData[] = $d;
    }
    return $journalData;
}

function deleteJournal($id)
{
    global $connectDb;
    $query = "DELETE FROM journal WHERE id = '$id'";
    $result = mysqli_query($connectDb, $query);
    return $result;
}

function updateJournal($id, $student_id, $job, $note, $date)
{
    global $connectDb;
    $query = "UPDATE journal SET student_id = '$student_id', job = '$job', note = '$note', date = '$date' WHERE id = '$id'";
    $result = mysqli_query($connectDb, $query);
    return $result;
}

function countJournalToday()
{
    global $connectDb;
    $date = date('Y-m-d');
    $query = "SELECT COUNT(*) as total FROM journal WHERE date = '$date'";
    $query = mysqli_query($connectDb, $query);
    $data = mysqli_fetch_assoc($query);
    return $data['total'];
}

function countJournalThisMonth()
{
    global $connectDb;
    $month = date('m');
    $query = "SELECT COUNT(*) as total FROM journal WHERE MONTH(date) = '$month'";
    $query = mysqli_query($connectDb, $query);
    $data = mysqli_fetch_assoc($query);
    return $data['total'];
}

function countJournalThisYear()
{
    global $connectDb;
    $year = date('Y');
    $query = "SELECT COUNT(*) as total FROM journal WHERE YEAR(date) = '$year'";
    $query = mysqli_query($connectDb, $query);
    $data = mysqli_fetch_assoc($query);
    return $data['total'];
}

function getJournalByUserId($id)
{
    global $connectDb;
    $query = "SELECT *, students.name as student_name, devision.name as devision_name, journal.id as id FROM journal LEFT JOIN students ON journal.student_id = students.id LEFT JOIN devision ON students.devision_id = devision.id WHERE journal.student_id = $id";
    $query = mysqli_query($connectDb, $query);
    $journalData = [];
    while ($d = mysqli_fetch_assoc($query)) {
        $journalData[] = $d;
    }
    return $journalData;
}

function getJournalById($id)
{
    global $connectDb;
    $query = "SELECT *, students.name as student_name, devision.name as devision_name, journal.id as id FROM journal LEFT JOIN students ON journal.student_id = students.id LEFT JOIN devision ON students.devision_id = devision.id WHERE journal.id = $id";
    $query = mysqli_query($connectDb, $query);
    $journalData = mysqli_fetch_assoc($query);
    return $journalData;
}