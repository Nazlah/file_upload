<?php


require_once("session_check.php");

require_once("koneksi.php");

$error = 0;

if ($sessionStatus == true) {
    if (isset($_GET["nis"])) $nis = $_GET["nis"];
    else echo "NIS TIdak Ditemukan! <a href'index.php'>Kembali</a>";

    $query = "SELECT * FROM siswa WHERE nis = '{$nis}'";

    $result = mysqli_query($mysqli, $query);

    foreach ($result as $siswa) {
        $foto = $siswa["foto"];
        $nis = $siswa["nis"];
        $name = $siswa["nama"];
        $address = $siswa["alamat"];
        $placeOfBirth = $siswa["tmp_lahir"];
        $dateOfBirth = $siswa["tgl_lahir"];
        $phone = $siswa["telepon"];

        $maleChecked = "";
        $femaleChecked = "";

        if ($siswa["jk"] == "L") {
            $maleChecked = "checked";
        } else if ($siswa["jk"] == "P") {
            $femaleChecked = "checked";
        }
    }
} else if ($sessionStatus == false) {
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <!-- navbar brand -->
            <a href="#" class="navbar-brand" JongKoding>
            <img src="gambar/logo.png">
            </a>

            <!-- navbar toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar collapse -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Daftar Siswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="form" class="pt-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col col-8 p-4 bg-light">

                    <form action="action_edit.php" method="POST" enctype="multipart/form-data">

                        <?php if (!is_null($foto) && !empty($foto)) : ?>
                            <div class="form-group mb-2">
                                <img src="<?= $foto ?>" class="preview" />
                                <a href="hapus_foto.php?nis=<?=$nis?>">Hapus Foto</a>
                            </div>
                        <?php endif; ?>

                        <div class="form-group mb-2">
                            <label for="foto">Foto</label>
                            <input name="foto" id="foto" value="<?= $foto ?>" class="form-control" type="file" />
                        </div>

                        <div class="form-group mb-2">
                            <label for="nis">NIS</label>
                            <input name="nis" id="nis" value="<?= $nis ?>" class="form-control" type="text" placeholder="Nomor Induk Siswa" readonly>
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Nama Lengkap</label>
                            <input name="name" id="name" value="<?= $name ?>" class="form-control" type="text" placeholder="Nama Lengkap" required>
                        </div>

                        <div class="form-group mb-2">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" <?= $maleChecked ?> type="radio" name="gender" id="male" value="L" required>
                                <label class="form-check-label" for="male">Laki-laki</label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" <?= $femaleChecked ?> type="radio" name="gender" id="female" value="P" required>
                                <label class="form-check-label" for="female">Perempuan</label>
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="address">Alamat</label>
                            <textarea name="address" class="form-control" id="address" rows="3" required><?= $address ?></textarea>
                        </div>

                        <div class="form-group mb-2">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input name="placeOfBirth" class="form-control" id="tmp_lahir" value="<?= $placeOfBirth ?>" type="text" placeholder="Kota Tempat Lahir" required></input>
                        </div>

                        <div class="form-group mb-2">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input name="dateOfBirth" class="form-control" id="tgl_lahir" value="<?= $dateOfBirth ?>" type="date" placeholder="Tanggal Lahir" required></input>
                        </div>

                        <div class="form-group mb-2">
                            <label for="phone">Telepon</label>
                            <input name="phone" class="form-control" id="phone" value="<?= $phone ?>" type="text" placeholder="Nomor Telepon" required></input>
                        </div>

                        <input name="submit" type="submit" value="kirim" class="btn btn-primary">
                    </form>

                </div>


            </div>
        </div>
    </div>


</body>

</html>