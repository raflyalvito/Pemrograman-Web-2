<?php
session_start();
require('functions.php');
$id = $_GET['id'];


if ($_SESSION['role'] !== 'admin') {
    echo "
    <script>
        alert('Anda tidak memiliki hak akses untuk menghapus data ini.');
        document.location.href = 'tampil.php';
    </script>
    ";
    exit;
}

if (hapus($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus.');
        document.location.href = 'tampil.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Gagal menghapus data.');
        document.location.href = 'tampil.php';
    </script>
    ";
}
