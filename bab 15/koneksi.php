<?php

$mysqli = new mysqli("localhost", "root", "", "coba_sekolah");

// check connection
if ($mysqli -> connect_errno) {
    echo "Gagal menyambungkan ke MySQL: " . $mysqli -> connect_errno;
    exit();
}



?>