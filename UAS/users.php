<?php

include "layout/header.php";

if (!isset($_SESSION['login'])) {
    echo "
    <script>
        alert ('Login dulu dong')
        document.location.href = 'index.php'
    </script>
";
}
if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'pimpinan') {
    echo "
    <script>
        alert ('Anda tidak mempunyai hak akses!')
        
    </script>
";
    exit;
}


$users = query("SELECT * FROM users ORDER BY id ASC");

if (isset($_POST['cari'])) {
    $users = cari_users($_POST['keyword']);
}

?>


<h1 class="text-center">Daftar Data Users</h1>
<div class="container">

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            Data Users
        </div>
        <div class="card-body ">
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <a href="cetak_users.php" class="btn btn-secondary mb-3" target="_blank">Cetak</a>
            <?php endif; ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Password</th>
                        <th>Waktu</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td>Password Ter-Enkripsi</td>
                            <td><?= date('d-m-Y H:i:s', strtotime($user['waktu'])); ?></td>



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