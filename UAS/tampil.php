<?php

include "layout/header.php";


if (!isset($_SESSION['login'])) {
    echo "
    <script>
        alert ('Login dulu dong')
        document.location.href = 'login.php'
    </script>
";
}



$pegawai = query("SELECT * FROM pegawai ORDER BY id ASC");

if (isset($_POST['cari'])) {
    $pegawai = cari($_POST['keyword']);
}

?>


<h1 class="text-center">Daftar Data Pegawai</h1>
<div class="container">

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            Daftar Pegawai
        </div>
        <div class="card-body ">
            <?php if ($_SESSION['role'] == 'pimpinan') : ?>
                <a href="cetak_pegawai.php" class="btn btn-secondary mb-3" target="_blank">Cetak</a>
            <?php endif; ?>
            <?php if ($_SESSION['role'] == 'pendaftar') : ?>
                <a href="form.php" class="btn btn-primary mb-3 float-end">Tambah</a>
            <?php endif; ?>
            <table class="table table-bordered table-striped">
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pegawai as $pgw) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td style="text-align: center;">
                                <img src="img/<?= $pgw['gambar']; ?>" style=" height: 100px;">
                            </td>
                            <td><?= $pgw['nama']; ?></td>
                            <td><?= $pgw['nik']; ?></td>
                            <td><?= $pgw['alamat']; ?></td>
                            <td><?= date('d-m-Y', strtotime($pgw['tanggal_lahir'])); ?></td>
                            <td><?= $pgw['telepon']; ?></td>
                            <td><?= $pgw['departemen']; ?></td>
                            <td><?= date('d-m-Y', strtotime($pgw['tanggal_bergabung'])); ?></td>
                            <td><?= $pgw['status']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="detail_pegawai.php?id=<?= $pgw['id']; ?>" class="btn btn-danger me-2">Detail</a>

                                    <a href="ubah.php?id=<?= $pgw['id']; ?>" class="btn btn-warning me-2">Ubah</a>

                                    <a href="hapus.php?id=<?= $pgw['id']; ?>" onclick="return confirm ('yakin?')" class="btn btn-danger">Hapus</a>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include "layout/footer.php";
?>