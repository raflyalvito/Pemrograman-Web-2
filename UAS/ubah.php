<?php
session_start();
require('functions.php');

if (!isset($_SESSION['login'])) {
    echo "
    <script>
        alert ('Login dulu dong')
        document.location.href = 'login.php'
    </script>
";
    exit;
}

$user_id = $_SESSION['user_id'];
$id_pegawai = $_GET['id'] ?? null;

if ($id_pegawai === null) {
    echo "
    <script>
        alert('ID pegawai tidak valid.');
        document.location.href = 'tampil.php';
    </script>
    ";
    exit;
}



$pgw = query("SELECT * FROM pegawai WHERE id = $id_pegawai")[0];

if ($pgw['id_user'] !== $user_id) {
    echo "
    <script>
        alert('Anda tidak memiliki hak akses untuk mengubah data pegawai ini.');
        document.location.href = 'tampil.php';
    </script>
    ";
    exit;
}

if (isset($_POST['edit'])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert ('Data berhasil diubah')
                document.location.href = 'tampil.php'
            </script>
        ";
    } else {
        echo "
                <script>
                    alert ('Data gagal diubah' )
                    document.location.href = 'ubah.php'
                </script>
            ";
        exit;
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data Pegawai</title>
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
    <h1 class="text-center">Edit Data Pegawai</h1>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Form Edit Data Pegawai
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" value="<?= $pgw['nama']; ?>" id="nama" name="nama" placeholder="Isi Nama" required autocomplete="off">
                        <input type="hidden" name="id" value="<?= $pgw['id']; ?>">

                        <input type="hidden" name="gambarlama" value="<?= $pgw["gambar"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="text" class="form-control" value="<?= $pgw['nik']; ?>" id="nik" name="nik" placeholder="Isi NIK" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Isi Alamat" required autocomplete="off"><?= $pgw['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" class="form-control" value="<?= $pgw['tanggal_lahir']; ?>" id="tanggal_lahir" name="tanggal_lahir" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon:</label>
                        <input type="tel" class="form-control" value="<?= $pgw['telepon']; ?>" id="telepon" name="telepon" placeholder="Isi Telepon" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="departemen">Departemen:</label>
                        <select class="form-control" value="<?= $pgw['departemen']; ?>" name="departemen" id="departemen" required>
                            <option value="<?= $pgw['departemen']; ?>"><?= $pgw['departemen']; ?></option>
                            <option value="Departemen Keuangan">Departemen Keuangan</option>
                            <option value="Departemen Sumber Daya Manusia">Departemen Sumber Daya Manusia</option>
                            <option value="Departemen Operasional">Departemen Operasional</option>
                            <option value="Departemen Riset dan Pengembangan">Departemen Riset dan Pengembangan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bergabung">Tanggal Bergabung:</label>
                        <input type="date" class="form-control" value="<?= $pgw['tanggal_bergabung']; ?>" id="tanggal_bergabung" name="tanggal_bergabung" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <div class="form-check">
                            <input class="form-check-input" value="aktif" <?= $pgw['status'] == 'aktif' ? 'checked' : ''; ?> type="radio" name="status" id="aktif" value="aktif" required autocomplete="off">
                            <label class="form-check-label" for="aktif">Aktif</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="non-aktif" <?= $pgw['status'] == 'non-aktif' ? 'checked' : ''; ?> type="radio" name="status" id="non-aktif" value="non-aktif" required autocomplete="off">
                            <label class="form-check-label" for="non-aktif">Non-Aktif</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar:</label>
                            <input type="file" id="gambar" name="gambar">
                            <img src="img/<?= $pgw['gambar']; ?>" alt="Gambar Pegawai" class="img-thumbnail mt-3" style="height: 200px">
                            <p>Gambar yang sudah ada: <strong><?= $pgw['gambar']; ?></strong></p>
                        </div>
                    </div>
                    <button type="submit" name="edit" class="btn btn-success mt-3">Simpan</button>
                    <button type="reset" name="reset" class="btn btn-danger mt-3">Kosongkan</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>