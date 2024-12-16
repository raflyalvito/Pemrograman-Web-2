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
$id = $_GET['id'];

$details = query("SELECT * FROM projek_pegawai WHERE id_pegawai =$id");


?>


<div class="card">
    <div class="card-header bg-success text-white">
        Detail Pegawai
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Proyek</th>
                    <th>Tanggal Mulai</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($details) > 0): ?>
                    <?php $i = 1; ?>
                    <?php foreach ($details as $detail) : ?>
                        <tr>


                            <td><?= $i++; ?></td>
                            <td><?= $detail['nama_proyek']; ?></td>
                            <td><?= date('d-m-Y', strtotime($detail['tanggal_mulai'])); ?></td>
                            <td><?= $detail['status']; ?></td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data ditemukan.</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>

<?php include "layout/footer.php"; ?>