<?php

require_once 'connection.php';
require_once 'session_check.php';

$query = 'SELECT * FROM barang';

$result = mysqli_query($mysqli, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Memanggil bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- CSS -->
    <link href="style.css" rel="stylesheet" />

    <!-- JavaScript -->
    <script type="text/javascript">
        function confirm_delete(){
            return confirm("Anda yakin?");
        }
    </script>

    <title>PHP dan MySQL</title>
</head>

<body>

<!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <!-- Navbar Brand -->
            <a class="navbar-brand" href="#">
                <p>iffah.</p>
            </a>

            <!-- Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link" aria-current="page">Daftar Barang</a>
                    </li>

                    <?php if ($sessionStatus == false): ?>

                    <li class="nav-item">
                        <a href="login.php" class="nav-link" aria-current="page">Login</a>
                    </li>

                    <?php else: ?>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" aria-current="page">Logout</a>
                    </li>

                    <?php endif; ?>
                </ul>

            </div>

        </div>
    </nav>


    <!-- Student List -->
    <div id="student-list">

        <div class="container">

        <?php if ($sessionStatus): ?>

            <div class="row mb-4">

                <div class="col">

                    <h4>Daftar Barang</h4>

                </div>

                <div class="col text-end">

                    <a href="form_barang.php" class="btn" role="button">Tambah Barang</a>

                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <table class="table">

                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Foto Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga Barang</th>
                            <th scope="col">Aksi</th>
                        </thead>

                        <tbody>

                        <?php
                        $i = 1;

                        foreach ($result as $barang) {
                            if (
                                $barang['foto'] == null ||
                                empty($barang['foto'])
                            ) {
                                $barang['foto'] = 'penyimpanan/_default.jpg';
                            }

                            echo '<tr>
                                <th scope="row">' .
                                $i++ .
                                '</th>
                                <td> <img src="' .
                                $barang['foto'] .
                                '"/> </td>
                                <td>' .
                                $barang['nama_barang'] .
                                '</td>
                                <td>' .
                                $barang['harga'] .
                                '</td>
                                <td>
                                    <a href="form_edit.php?id=' .
                                $barang['id_barang'] .
                                '">Edit</a>
                                    <a href="delete.php?id=' .
                                $barang['id_barang'] .
                                '" onclick=" return confirm_delete()" >Delete</a>
                                </td>
                            </tr>';
                        }
                        ?>

                        </tbody>

                    </table>

                </div>

            </div>

            <?php else: ?>

                <div class="row">
                    <h2 class="text-center">LOGIN TERLEBIH DAHULU!</h2>
                </div>

            <?php endif; ?>


        </div>

    </div>
</body>

</html>