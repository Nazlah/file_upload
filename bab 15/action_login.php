<?php


require_once("koneksi.php");


$error = 0;


if ( isset($_POST['email']) ) $email = $_POST['email'];
else $error = 1;

if ( isset($_POST['password']) ) $password = $_POST['password'];
else $error = 1;
if ($error == 1) {
    echo "Terjadi kesalahan pada data inputan <a href='login.php'>Kembali</a>";
    exit();
}
$password = hash("sha256", $password);
$query = "SELECT * FROM petugas WHERE email = '{$email}'";
$result = mysqli_query($mysqli, $query);

$data = mysqli_fetch_assoc($result);

if (is_null($data)) {
    echo "Email tidak terdaftar! <a href='login.php'>Kembali</a>";
    exit();
}
else if ($data['password'] !=$password) {
    echo "Password salah! <a href='login.php'>Kembali</a>";
    exit();
}
else {
    session_start();

    $_SESSION["status"] = true;
    $_SESSION["name"] = $data["nama"];
    $_SESSION["email"] = $data["email"];
    
    header("Location: index.php");
}


?>