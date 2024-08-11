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
        header('Location: /siswa/kelola-jurnal.php?status=success&message=Jurnal berhasil ditambahkan');
    } else {
        echo "Gagal menambahkan data";
    }
} elseif ($params == 'delete') {
    $id = $_GET['id'];
    echo "<script>
        var confirmDelete = confirm('Apakah Anda yakin ingin menghapus jurnal ini?');
        if (confirmDelete) {
            window.location.href = '/controller/journalController.php?action=confirm_delete&id=$id';
        } else {
            window.location.href = '/siswa/kelola-jurnal.php';
        }
    </script>";
} elseif ($params == 'confirm_delete') {
    $id = $_GET['id'];
    $result = deleteJournal($id);
    if ($result) {
        if ($_SESSION['role'] == 'administrator') {
            header('Location: /dashboard/kelola-jurnal.php?status=success&message=Jurnal berhasil dihapus');
        } else {
            header('Location: /siswa/kelola-jurnal.php?status=success&message=Jurnal berhasil dihapus');
        }
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
        header('Location: /siswa/kelola-jurnal.php?status=success&message=Jurnal berhasil diupdate');
    } else {
        echo "Gagal mengupdate data";
    }
} elseif ($params == 'get') {
    $data = getJournal();
    echo json_encode($data);
} elseif ($params == 'countToday') {
    $data = countJournalToday();
    echo json_encode($data);
} elseif ($params == 'countMonth') {
    $data = countJournalThisMonth();
    echo json_encode($data);
} elseif ($params == 'countYear') {
    $data = countJournalThisYear();
    echo json_encode($data);
} else if ($params == 'getByUser') {
    $student_id = $_GET['student_id'];
    $data = getJournalByUserId($student_id);
    echo json_encode($data);
} else {
    echo "404 Not Found";
}