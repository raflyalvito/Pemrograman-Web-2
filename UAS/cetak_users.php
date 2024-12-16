<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'functions.php';

$users = query("SELECT * FROM users");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Users</title>
     <link rel="stylesheet" href="css/print.css">
    
</head>
<body>
    <h1>Daftar Data Users</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Password</th>
                <th>Waktu</th>
                
            </tr>
        </thead>
        <tbody>'; // Mulai tbody

$no = 1; // Inisialisasi nomor urut
foreach ($users as $row) {
    $html .= '<tr>';
    $html .= '<td>' . $no++ . '</td>'; // Menampilkan nomor urut

    $html .= '<td>' . $row['username'] . '</td>';
    $html .= '<td>' . $row['email'] . '</td>';
    $html .= '<td>' . $row['role'] . '</td>';
    $html .= '<td>' . 'Password Ter-Enkripsi' . '</td>';
    $formattedDate = date('d-m-Y H:i:s', strtotime($row['waktu']));
    $html .= '<td>' . $formattedDate . '</td>';



    $html .= '</tr>';
}
$html .= '</tbody>'; // Menutup tbod
$html .= '</table>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-data-users.pdf', 'I');
