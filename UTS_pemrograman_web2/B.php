<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: center;
            font-size: 16px;
            color: #555;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: #ccc;
            margin: 10px 0;
        }

        .struk {
            margin: 0 auto;
            width: 300px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .item {
            margin: 5px 0;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #333;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }

        .diskon {
            color: red;
            font-weight: bold;
        }

        .pembayaran {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
$tanggal_transaksi = "30 Oktober 2024";

$produk = [
    ['nama' => 'Bedak', 'jumlah' => 15, 'harga_satuan' => 14990],
    ['nama' => 'Baju Bayi', 'jumlah' => 15, 'harga_satuan' => 35500],
    ['nama' => 'Buavita', 'jumlah' => 15, 'harga_satuan' => 10890],
    ['nama' => 'Shampo', 'jumlah' => 10, 'harga_satuan' => 21980],
    ['nama' => 'Buavita', 'jumlah' => 3, 'harga_satuan' => 10890]
];

$total_pembelian = 0;
foreach ($produk as $item) {
    $total_pembelian += $item['jumlah'] * $item['harga_satuan'];
}

$diskon = 0;
if ($total_pembelian >= 400000) {
    $diskon = 0.35; 
} elseif ($total_pembelian >= 250000) {
    $diskon = 0.20; 
}

$total_diskon = $total_pembelian * $diskon;
$total_pembayaran = $total_pembelian - $total_diskon;

echo "<div class='struk'>";
echo "<h2>Struk Belanja</h2>";
echo "<p>Tanggal Transaksi: $tanggal_transaksi</p>";
echo "<hr>";

foreach ($produk as $item) {
    $total_produk = $item['jumlah'] * $item['harga_satuan'];
    echo "<div class='item'>
            <span>" . htmlspecialchars($item['nama']) . " (x" . htmlspecialchars($item['jumlah']) . ")</span>
            <span>" . number_format($total_produk, 0, ',', '.') . "</span>
          </div>";
}

echo "<hr>";
echo "<div class='total'><span>Total Pembelian:</span> <span>" . number_format($total_pembelian, 0, ',', '.') . "</span></div>";
echo "<div class='diskon'><span>Diskon (" . ($diskon * 100) . "%):</span> <span>" . number_format($total_diskon, 0, ',', '.') . "</span></div>";
echo "<div class='pembayaran'><span>Total Pembayaran:</span> <span>" . number_format($total_pembayaran, 0, ',', '.') . "</span></div>";
echo "</div>";
?>

</body>
</html>