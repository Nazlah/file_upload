<?php

require_once("koneksi.php");
if ( isset($_GET["nis"]) ) $nis = $_GET["nis"];
else {
    echo "NIS TIdak Ditemukan! <a href'index.php'>Kembali</a>";
    exit();
}
$query = "SELECT * FROM siswa WHERE nis = '{$nis}'";

$result = mysqli_query($mysqli, $query);

foreach ($result as $siswa) {
    $foto = $siswa["foto"];
}

if ( !is_null($foto) && !empty($foto)) {
    $remove = unlink($foto);

    if ($remove) {
        $query = "
        UPDATE siswa SET
            foto = NULL
        WHERE nis = '{$nis}'";

        $insert = mysqli_query($mysqli, $query);
    }
}

header("Location: form_edit.php?nis={$nis}");

?>
