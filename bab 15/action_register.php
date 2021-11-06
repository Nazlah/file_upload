<?php

require_once("koneksi.php");

$error = 0;

if ( isset($_POST['email']) ) $email = $_POST['email'];
else $error = 1; 

if ( isset($_POST['name']) ) $name = $_POST['name'];
else $error = 1; 

if ( isset($_POST['password']) ) $password = $_POST['password'];
else $error = 1; 

if ( isset($_POST['re-password']) ) $repassword = $_POST['re-password'];
else $error = 1; 


if ($error == 1) {
    echo "Terjadi kesalahan pada proses input data <a href='registration.php'>Kembali</a>";
    exit();
}

if ($password != $repassword) {
    echo "Password tidak sama, ulangi mengisi form pendaftaran! <a href='registration.php'>Kembali</a>";
    exit();
}
else {
    $password = hash("sha256", $password);
}

$query = "
    INSERT INTO petugas
    (email, nama, password)
    VALUES
    ('{$email}', '{$name}', '{$password}');";

$insert = mysqli_Query($mysqli, $query);

if ( $insert == false ) {
    echo "Error dalam menambahkan data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}
?>