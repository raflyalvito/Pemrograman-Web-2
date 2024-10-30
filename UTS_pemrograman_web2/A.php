<?php
   $data = [
    ["Buavita", "30", "10890" ],
    ["Bango", "21", "21890"],
    ["Sariwangi", "10", "9990"],
    ["Shampo Bayi", "20", "21980"],
    ["Bedak", "15", "14990"],
    ["Baju Bayi", "20", "35500"],
    ["Jumper", "25", "49999"]
];
$totalJumlah=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%; 
        }
        td, th {
            text-align: center; 
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="2" cellspacing="2">
        <tr>
            <th>Id</th>
            <th>Produk</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
        <?php foreach($data as $index => $row) :?>
        <?php $jumlah = $row[1] * $row[2];?>
        <?php $totalJumlah += $jumlah;?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $row[0]; ?></td>
            <td><?= $row[1]; ?></td>
            <td><?= number_format($row[2], 0, ',', '.'); ?></td>
        <td><?= number_format($jumlah, 0, ',', '.'); ?></td>
            
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" style="text-align: center;"><strong>Total:</strong></td>
            <td><strong><?= number_format($totalJumlah, 0, ',', '.'); ?></strong></td>
        </tr>
    </table>
</body>
</html>