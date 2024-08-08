<?php


require_once ('../inc/config.php');
require_once ('../function/jurnalFunction.php');

$params = $_GET['action'];
if ($params == 'add') {
    $student_id = $_POST['student_id'];
    $job = $_POST['job'];
    $note = $_POST['note'];
    $date = $_POST['date'];
    $result = addJournal($student_id, $job, $note, $date);
    if ($result) {
        header('Location: /dashboard/kelola-jurnal.php?status=success&message=Jurnal berhasil ditambahkan');
    } else {
        echo "Gagal menambahkan data";
    }
} elseif ($params == 'delete') {
    $id = $_GET['id'];
    $result = deleteJournal($id);
    if ($result) {
        header('Location: /dashboard/kelola-jurnal.php?status=success&message=Jurnal berhasil dihapus');
    } else {
        echo "Gagal menghapus data";
    }
} elseif ($params == 'update') {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $job = $_POST['job'];
    $note = $_POST['note'];
    $date = $_POST['date'];
    $result = updateJournal($id, $student_id, $job, $note, $date);
    if ($result) {
        header('Location: /dashboard/kelola-jurnal.php?status=success&message=Jurnal berhasil diupdate');
    } else {
        echo "Gagal mengupdate data";
    }
} elseif ($params == 'get') {
    $data = getJournal();
    echo json_encode($data);
}