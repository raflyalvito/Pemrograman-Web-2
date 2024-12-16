<?php
session_start();
include 'functions.php';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$users = query("SELECT * FROM users WHERE username = '$username'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-grey"> CRUD PHP</a></li>
                    <li><a href="tampil.php" class="nav-link px-2 text-white">Data Pegawai</a></li>
                    <li><a href="users.php" class="nav-link px-2 text-white">Data Users</a></li>
                    <li><a href="form_proyek.php" class="nav-link px-2 text-white">Projek Pegawai</a></li>


                </ul>


                <?php if (!isset($_SESSION['login'])): ?>
                    <div class="text-end">
                        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href='login.php'">Login</button>
                        <button type="button" class="btn btn-warning" onclick="window.location.href='register.php'">Register</button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['login'])): ?>
                    <div class="d-flex align-items-center text-end">
                        <p class="text-light fw-bold me-4 mb-0"><?= $username; ?></p>
                        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href='logout.php'">Logout</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>