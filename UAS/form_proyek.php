<?php include "layout/header.php"; ?>

<?php
if (!isset($_SESSION['login'])) {
    echo "
    <script>
        alert ('Login dulu dong')
        document.location.href = 'login.php'
    </script>
";
}
if ($_SESSION['role'] != 'admin') {
    echo "
    <script>
        alert ('Anda tidak memiliki hak akses!')
        
    </script>
";
    exit;
}

$pegawai = query("SELECT * FROM pegawai");

if (!$pegawai) {
    echo "<script>alert('Tidak ada data pegawai.');</script>";
    exit;
}

if (isset($_POST['submit'])) {
    if (form_proyek($_POST) > 0) {
        echo "<script>alert('Data berhasil disimpan.');</script>";
    }
}
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Form Input Projek Pegawai
        </div>
        <div class="card-header">

            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="employee_id">Pilih Pegawai:</label>
                        <select class="form-control" name="id_pegawai" id="employee_id" required>
                            <option value="" disabled selected>--Pilih Pegawai--</option>
                            <?php foreach ($pegawai as $pgw) : ?>

                                <option value="<?= $pgw['id']; ?>"><?= $pgw['nama']; ?></option>


                            <?php endforeach; ?>



                        </select>
                    </div>

                    <div class="form-group">
                        <label for="project_name">Nama Proyek:</label>
                        <input class="form-control" type="text" name="nama_proyek" id="project_name" placeholder="Isi Nama" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai:</label>
                        <input class="form-control" type="date" name="tanggal_mulai" id="start_date" required>
                    </div>



                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="" selected disabled>--Pilih Status--</option>
                            <option value="dikerjakan">Di Kerjakan</option>
                            <option value="selesai">Selesai</option>
                            <option value="ditahan">Di Tahan</option>
                        </select>
                    </div>

                    <button class="btn btn-success mt-3" type="submit" name="submit">Tambah Proyek</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "layout/footer.php"; ?>