<?php
session_start();
require("functions.php");

if (!isset($_SESSION['login'])) {
    echo "
    <script>
        alert ('Login dulu dong')
        document.location.href = 'login.php'
    </script>
";
}
$id_user = $_SESSION['user_id'];
if (isset($_POST["submit"])) {
    if ($id_user) {
        if (tambah($_POST, $id_user) > 0) {
            echo "
            <script>
                alert ('Data berhasil ditambahkan')
                document.location.href = 'tampil.php'
            </script>
        ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        .form-check-label {
            margin-left: 10px;
        }
    </style>
</head>
</head>

<body>
    <h1 class="text-center">Isi Data Pegawai</h1>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Form Input Data Pegawai
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama" required autocomplete="off">

                    </div>
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Isi NIK" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Isi Alamat" required autocomplete="off"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon:</label>
                        <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Isi Telepon" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="departemen">Departemen:</label>
                        <select class="form-control" name="departemen" id="departemen" required>
                            <option value="" disabled selected>--Pilih Departemen--</option>
                            <option value="Departemen Keuangan">Departemen Keuangan</option>
                            <option value="Departemen Sumber Daya Manusia">Departemen Sumber Daya Manusia</option>
                            <option value="Departemen Operasional">Departemen Operasional</option>
                            <option value="Departemen Riset dan Pengembangan">Departemen Riset dan Pengembangan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bergabung">Tanggal Bergabung:</label>
                        <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="aktif" value="aktif" required autocomplete="off">
                            <label class="form-check-label" for="aktif">Aktif</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="non-aktif" value="non-aktif" required autocomplete="off">
                            <label class="form-check-label" for="non-aktif">Non-Aktif</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar:</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImg()">
                            <img src="" alt="" class="img-thumbnail img-preview mt-3" width="100px">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success mt-3">Simpan</button>
                    <button type="reset" name="reset" class="btn btn-danger mt-3">Kosongkan</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        function previewImg() {
            const foto = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');
            const fileFoto = new FileReader();

            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

</body>

</html>