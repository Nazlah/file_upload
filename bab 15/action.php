<?php

require_once("koneksi.php");

$error = 0;

if ( isset($_POST['nis']) ) $nis = $_POST['nis'];
else $error = 1; 

if ( isset($_POST['name']) ) $name = $_POST['name'];
else $error = 1; 

if ( isset($_POST['gender']) ) $gender = $_POST['gender'];
else $error = 1; 

if ( isset($_POST['address']) ) $address = $_POST['address'];
else $error = 1; 

if ( isset($_POST['placeOfBirth']) ) $placeOfBirth = $_POST['placeOfBirth'];
else $error = 1; 

if ( isset($_POST['dateOfBirth']) ) $dateOfBirth = $_POST['dateOfBirth'];
else $error = 1; 

if ( isset($_POST['phone']) ) $phone = $_POST['phone'];
else $error = 1; 

if ($error == 1) {
    echo "Terjadi kesalahan pada proses input data";
    exit();
}

$files = $_FILES['foto'];
$path = "penyimpanan/";

if ( !empty($files['name']) ) {
    $filepath = $path . $files["name"];
    $upload = move_uploaded_file($files["tmp_name"], $filepath);
}
else {
    $filepath = "";
    $upload = false;
}

if ($upload != true && $filepath != "" ) {
    exit("Gagal Mengupload File <a href='form_siswa.php'>kembali</a>");
}

$query = "
    INSERT INTO siswa
    (nis, nama, jk, alamat, tmp_lahir, tgl_lahir, telepon, id_jurusan, foto)
    VALUES
    ('{$nis}', '{$name}', '{$gender}', '{$address}', '{$placeOfBirth}', '{$dateOfBirth}', '{$phone}', 0, '{$filepath}');";
    

$insert = mysqli_Query($mysqli, $query);

if ( $insert == false ) {
    echo "Error dalam menambahkan data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}
?>