<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_pegawai');
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data, $id_user)
{
    global $conn;
    $nama = $data["nama"];
    $nik = $data["nik"];
    $alamat = $data["alamat"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $telepon = $data["telepon"];
    $departemen = $data["departemen"];
    $tanggal_bergabung = $data["tanggal_bergabung"];
    $status = $data["status"];

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO pegawai VALUES ('',
                                        '$id_user',
                                        '$gambar',
                                        '$nama', 
                                        '$nik', 
                                        '$alamat', 
                                        '$tanggal_lahir', 
                                        '$telepon', 
                                        '$departemen', 
                                        '$tanggal_bergabung', 
                                        '$status' 
                                        )";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
        return false;
    }

    // cek apakah yg diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('yang anda upload bukan gambar')</script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 100000000) {
        echo "<script>alert('ukuran gambar terlalu besar')</script>";
        return false;
    }

    // Menghindari nama file yang sama
    $newFileName = uniqid() . '.' . $ekstensiGambar;
    //lolos pengecekan, gambar siap diupload
    move_uploaded_file($tmpName, 'img/' . $newFileName);

    return $newFileName;
}

function ubah($data)
{
    global $conn;
    $id = $data['id'];
    $nama = $data['nama'];
    $nik = $data['nik'];
    $alamat = $data['alamat'];
    $tanggal_lahir = $data['tanggal_lahir'];
    $telepon = $data['telepon'];
    $departemen = $data['departemen'];
    $tanggal_bergabung = $data['tanggal_bergabung'];
    $status = $data['status'];
    $gambarlama = $data['gambarlama'];
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE pegawai SET gambar = '$gambar',
                                 nama = '$nama',
                                 nik = '$nik',
                                 alamat = '$alamat',
                                 tanggal_lahir = '$tanggal_lahir',
                                 telepon= '$telepon',
                                 departemen = '$departemen',
                                 tanggal_bergabung = '$tanggal_bergabung',
                                 status = '$status'
                                 WHERE id = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    $foto = query("SELECT * FROM pegawai WHERE id = $id")[0];
    unlink("img/" . $foto['gambar']);
    mysqli_query($conn, "DELETE FROM pegawai WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM pegawai
             WHERE
            nama LIKE '%$keyword%' OR
            nik LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%' OR
            tanggal_lahir LIKE '%$keyword%' OR
            telepon LIKE '%$keyword%' OR
            departemen LIKE '%$keyword%' OR
            tanggal_bergabung LIKE '%$keyword%' OR
            status LIKE '%$keyword%' OR 
            gambar LIKE '%$keyword%'
            ";
    return query($query);
}



function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = $data['password'];
    $password2 = $data['password2'];



    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");


    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar')</script>";

        return false;
    }

    // cek konfirmasi password

    if ($password !== $password2) {
        echo "
        <script>
            alert ('Konfirmasi password tidak sesuai')
            
        </script>
    ";
        return false;
    }

    // enkripsi password

    $password = password_hash($password, PASSWORD_DEFAULT);


    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$email', '$password', 'pendaftar', CURRENT_TIMESTAMP())");


    return mysqli_affected_rows($conn);
}

function cari_users($keyword)
{
    $query = "SELECT * FROM users
             WHERE
            username LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            role LIKE '%$keyword%' 
            
            ";
    return query($query);
}


function form_proyek($data)
{
    global $conn;



    $id_pegawai = $data['id_pegawai'] ?? null;
    $nama_proyek = $data['nama_proyek' ?? ''];
    $tanggal_mulai = $data['tanggal_mulai'] ?? '';
    $status = $data['status'] ?? '';

    $query = "INSERT INTO projek_pegawai VALUES ( '',
                                                '$id_pegawai',
                                                 '$nama_proyek',
                                                 '$tanggal_mulai',
                                                  '$status')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
