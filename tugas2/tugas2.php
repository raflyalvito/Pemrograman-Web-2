<?php
$headers = [
            "No", 
            "Nama",
            "Gambar",
            "Tempat Lahir", 
            "Tanggal Lahir", 
            "Julukan", 
            "Meninggal" 
        ];
$pahlawan = [
    [
        "Nama" => "Ir. Soekarno",
        "Tempat Lahir" => "Jawa Timur",
        "Tanggal Lahir" => "6 Juni 1901",
        "Julukan" => "Putra Sang Fajar",
        "Meninggal" => "21 Juni 1970",
        "Gambar" => "img/soekarno.jpg"
    ],
    [
        "Nama" => "Mohammad Hatta",
        "Tempat Lahir" => "Bukit Tinggi, Sumatera Barat",
        "Tanggal Lahir" => "12 Agustus 1902",
        "Julukan" => "Bapak Koperasi",
        "Meninggal" => "14 Maret 1980",
        "Gambar" => "img/hatta.jpg"
    ],
    [
        "Nama" => "Wage Rudolf Supratman",
        "Tempat Lahir" => "Purworejo, Jawa Timur",
        "Tanggal Lahir" => "19 Maret 1903",
        "Julukan" => "",
        "Meninggal" => "17 Agustus 1938",
        "Gambar" => "img/supratman.jpg"
    ],
    [
        "Nama" => "Ahmad Yani",
        "Tempat Lahir" => "Purworejo, Jawa Timur",
        "Tanggal Lahir" => "19 Juni 1922",
        "Julukan" => "Juruselamat Magelang",
        "Meninggal" => "1 Oktober 1965",
        "Gambar" => "img/ahmad.jpg"
    ],
    [
        "Nama" => "Raden Ayu Adipati Kartini Djojoadhiningrat",
        "Tempat Lahir" => "Jepara, Jawa Tengah",
        "Tanggal Lahir" => "21 April 1879",
        "Julukan" => "Kuda Kore Ayu",
        "Meninggal" => "17 September 1904",
        "Gambar" => "img/kartini.jpg"
    ],
    [
        "Nama" => "Sutomo",
        "Tempat Lahir" => "Jawa Timur",
        "Tanggal Lahir" => "3 Oktober 1920",
        "Julukan" => "Bung Tomo",
        "Meninggal" => "7 Oktober 1981",
        "Gambar" => "img/tomo.jpg"
    ],
    [
        "Nama" => "Tuanku Imam Bonjol",
        "Tempat Lahir" => "Pasaman, Sumatera Barat",
        "Tanggal Lahir" => "1771",
        "Julukan" => "Peto Syarif",
        "Meninggal" => "6 November 1864",
        "Gambar" => "img/imam.jpg"
    ],
    [
        "Nama" => "Ki Hadjar Dewantara",
        "Tempat Lahir" => "Yogyakarta",
        "Tanggal Lahir" => "2 Mei 1889",
        "Julukan" => "Bapak Pendidikan Indonesia",
        "Meninggal" => "26 April 1959",
        "Gambar" => "img/kihajar.jpg"
    ],
    [
        "Nama" => "Soedirman",
        "Tempat Lahir" => "Purbalingga, Jawa Tengah",
        "Tanggal Lahir" => "24 Januari 1916",
        "Julukan" => "Bapak Gerilya Indonesia",
        "Meninggal" => "29 Januari 1950",
        "Gambar" => "img/sudirman.jpg"
    ],
    [
        "Nama" => "Pangeran Diponegoro",
        "Tempat Lahir" => "Yogyakarta",
        "Tanggal Lahir" => "11 November 1785",
        "Julukan" => "Ksatria Tersembunyi",
        "Meninggal" => "8 Januari 1855",
        "Gambar" => "img/diponegoro.jpg"
    ]
    ];
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
    <table border="2" cellpadding="3" cellspacing="3">
            <tr>
                <?php foreach($headers as $header): ?>
                    <th><?=  $header?></th>
                <?php endforeach ; ?>
            </tr>
        <?php foreach($pahlawan as $index => $pahlwn) : ?>
            <tr>
                <td><?= $index + 1 ?></td> 
                <td><?= $pahlwn['Nama'] ?></td>
                <td style="display: flex; justify-content: center;"><img src="<?= $pahlwn['Gambar']?>" weight="50" height="50" ></td>
                <td><?= $pahlwn['Tempat Lahir'] ?></td>
                <td><?= $pahlwn['Tanggal Lahir'] ?></td>
                <td><?= $pahlwn['Julukan'] ?></td>
                <td><?= $pahlwn['Meninggal']?></td>
            </tr>
        <?php endforeach ; ?>

    </table>
</body>
</html>