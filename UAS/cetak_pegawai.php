<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'functions.php';



$pegawai = query("SELECT * FROM pegawai");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Pegawai</title>
     <link rel="stylesheet" href="css/print.css">
    
</head>
<body>
    <h1>Daftar Data Pegawai</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Telepon</th>
                <th>Departemen</th>
                <th>Tanggal Bergabung</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>'; // Mulai tbody

$no = 1; // Inisialisasi nomor urut
foreach ($pegawai as $row) {
    $html .= '<tr>';
    $html .= '<td>' . $no++ . '</td>'; // Menampilkan nomor urut
    $html .= '<td><img src="img/' . $row['gambar'] . '" alt="gambar" width="50"></td>'; // Menampilkan gambar
    $html .= '<td>' . $row['nama'] . '</td>';
    $html .= '<td>' . $row['nik'] . '</td>';
    $html .= '<td>' . $row['alamat'] . '</td>';
    $html .= '<td>' . $row['tanggal_lahir'] . '</td>';
    $html .= '<td>' . $row['telepon'] . '</td>';
    $html .= '<td>' . $row['departemen'] . '</td>';
    $html .= '<td>' . $row['tanggal_bergabung'] . '</td>';
    $html .= '<td>' . $row['status'] . '</td>';

    $html .= '</tr>';
}
$html .= '</tbody>'; // Menutup tbod
$html .= '</table>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-data-pegawai.pdf', 'I');
