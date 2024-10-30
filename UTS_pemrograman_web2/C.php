<?php
$headers= [
    "Id",
    "Produk",
    "Stok",
    "Harga",
    "Jumlah"
];
$data = [
    ["Produk"=> "Buahvita","Stok"=> "30","Harga"=> "10890"],
    ["Produk"=>"Bango","Stok"=> "21","Harga"=> "21890"],
    ["Produk"=>"Sariwangi","Stok"=> "10","Harga"=> "9990"],
    ["Produk"=>"Shampo Bayi","Stok"=> "20","Harga"=> "21980"],
    ["Produk"=>"Bedak","Stok"=> "15","Harga"=> "14990"],
    ["Produk"=>"Baju Bayi","Stok"=> "20","Harga"=> "35500"],
    ["Produk"=>"Jumper","Stok"=> "25","Harga"=> "49999"]
];


    function diskon($pembelian){
        if($pembelian == 400000){
            $diskon= 35;
        }elseif($pembelian == 250000){
            $diskon= 20;
        }else{
            $diskon= 0;
        }
        $totalDiskon = ($pembelian * $diskon) / 100;
        $totalBayar = $pembelian - $totalDiskon;
    }
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
    <table border="1" >
        <tr>
            <?php foreach($headers as $header) : ?>
                <th><?= $header;?></th>
            <?php endforeach;?>

        </tr>
       <?php foreach($data as $index => $row) :?>
        <?php $jumlah = $row["Stok"] * $row["Harga"];?>
        <?php $totalJumlah+=$jumlah;?>
        <tr>
            <td><?= $index + 1;?></td>
            <td><?= $row['Produk'];?></td>
            <td><?= $row['Stok'];?></td>
            <td><?= number_format((float)$row['Harga'], 0, ',', '.'); ?></td>
        <td><?= number_format($jumlah, 0, ',', '.'); ?></td>
            
        </tr>
        <?php endforeach;?>
        <tr>
        <td colspan="4" style="text-align: center;"><strong>Total:</strong></td>
        <td><strong><?= number_format($totalJumlah, 0, ',', '.'); ?></strong></td>
        </tr>
    </table>
</body>
</html>