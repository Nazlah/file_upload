<?php


require_once("session_check.php");
require_once("koneksi.php");
if ( $sessionStatus == true ) {
    if ( isset($_GET["nis"]) ) $nis = $_GET["nis"];
    else {
        echo "NIS TIdak Ditemukan! <a href'index.php'>Kembali</a>";
        exit();
    }
    $query = "DELETE FROM siswa WHERE nis = '{$nis}'";

    $result = mysqli_query($mysqli, $query);

    if (! $result) {
        exit("Gagal Menghapus Data!");
    }

    header("Location: index.php");

}
else if ( $sessionStatus == false ) {
    header("Location: index.php");
}


?>
