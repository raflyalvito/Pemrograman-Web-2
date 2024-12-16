<?php
session_start();
require('functions.php');

if (isset($_SESSION['login'])) {
    // Jika sudah login, redirect ke halaman dashboard atau halaman lain
    header("Location: index.php"); // Ganti dengan halaman yang sesuai
    exit();
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['login'] = true;

            header("location: index.php");
            exit;
        }
    }

    $error = true;
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/login.css">

    <title>Login </title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Login</h3>
                                <p class="mb-4">Silahkan Login</p>
                                <?php if (isset($error)): ?>
                                    <p style="color: red; font-style: italic;">username/ password salah</p>
                                <?php endif; ?>


                            </div>
                            <form action="" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" autocomplete="off">

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">

                                </div>
                                <button class="btn btn-block btn-primary" type="submit" name="login">Login</button>

                                <span class="d-block text-left my-4 text-muted">tidak punya akun ? <a href="register.php">Register</a></span>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>