<?php

include "../koneksi.php";

$suppliers = $conn->query("SELECT * FROM supplier");
$transaksi = $conn->query("SELECT * FROM transaksi");
$rak = $conn->query("SELECT * FROM rak");

if (isset($_POST['submit'])) {
    $ruang = htmlspecialchars($_POST['ruang']);
    $baris = htmlspecialchars($_POST['baris']);
    $rak = htmlspecialchars($_POST['rak']);
    $trid = htmlspecialchars($_POST['trid']);

    $simpan = $conn->query("INSERT INTO transaksi VALUES (NULL, '$ruang','$baris','$rak','$trid')");
    // $simpan = $conn->query("INSERT INTO supplier values (NULL, '$nama','$kontak','$telp','$alamat','$email')");
    // $simpan = mysqli_query($conn, "INSERT INTO supplier(nama,kontak,telp,alamat,email) VALUES ('$nama','$kontak','$telp','$alamat','$email') ");

    if ($simpan == TRUE) {
        $alert = "Data Berhasil Disimpan";
        echo '<script>location.replace("index.php"); </script>';
        // header('location: index.php');
    }

    // if (empty($nama) or empty($kontak) or empty($telp) or empty($alamat) or empty($email)) {
    //     $alert = "Masukan Data dengan lengkap";
    // } else {
    //     $simpan;
    //     echo '<script>location.replace("");</script>';
    // }
}

if (isset($_POST['delete'])) {
    $id = htmlspecialchars($_POST['id']);
    $delete = mysqli_query($conn, "DELETE FROM transaksi where id = '$id'");

    $swal = 1;
    echo '<script>
                setInterval(function () {
                    window.location.href="index.php"
                }, 1000);
            </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logo/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../app/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Rak - Yasz Storage Supplier</title>
</head>
<style>
    .aa:focus {
        box-shadow: none;
        opacity: 100%;
        border-color: gray;
    }

    .aa {
        border: none;
        border-bottom: solid 1px gray;
        border-radius: 0;
        padding-left: 5px;
        opacity: 70%;
    }

    .pp {
        height: 10px;
    }

    .na {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 3;
    }

    .supp {
        position: relative;
        top: 30px;
    }
</style>

<body>
    <div class="na navbar navbar-expand-lg bg-dark bg-gradient navbar-dark">
        <div class="container-fluid ">
            <a class="navbar-brand h3 mb-0 text-white ps-5" href="../index.php">Yasz Storage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto p-1">
                    <a class="nav-link " aria-current="page" href="../">Home</a>
                    <a class="nav-link" href="../barang/">Barang</a>
                    <a class="nav-link " href="../supplier/">Supplier</a>
                    <a class="nav-link " href="../transaksi/">Transaksi</a>
                    <a class="nav-link " href="../admin/">Admin</a>
                    <a class="nav-link  active" href="">Rak</a>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h1 class=" text-center mt-5 supp">Form Rak</h1>
    </div>
    <div class="container mt-3 supp">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg mb-3">
                    <div class="card-header bg-dark mb-3">
                        <h3 class="mb-0 text-white ps-5">Tambah Data Rak</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">

                                <div class="form-group mb-3">
                                    <label for="">Transaksi Id <i class='bx bx-user'></i></label>
                                    <select name="trid" required class=" form-select aa" id="">
                                        <option value="" selected></option>
                                        <?php foreach ($transaksi as $trans) { ?>
                                            <option value="<?= $trans['id'] ?>"><?= $trans['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group text-end mt-4">
                                    <button class="btn btn-primary mt-4 btn-st" type="submit" name="submit">Submit</button>

                                    <button class="btn btn-danger mt-4" type="reset" name="btn-reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-bg-dark ">
                        <p class="text-center mb-0 ">&copy;Copyright Yasz Storage. All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="card shadow-lg">
                    <div class="card-header text-bg-dark">
                        <h3 class=" text-center">Table Data</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ruang Rak</th>
                                    <th>Baris Ruang</th>
                                    <th>Rak Kode</th>
                                    <th>Transaksi Id</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($transaksi as $trans) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $trans['ruang_rak'] ?></td>
                                        <td><?= $trans['baris_ruang'] ?></td>
                                        <td><?= $trans['rak_kode'] ?></td>
                                        <td><?= $trans['id_transaksi'] ?></td>
                                        <td class="justify-content-center d-flex gap-1">
                                            <a href="../edit/edit_supp.php?id=<?= $supplier['id'] ?> " class="btn btn-primary btn-sm">Edit</a>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $supplier['id'] ?>">
                                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <?php
    if (isset($swal)) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Di Hapus',
            showConfirmButton: false,
            timer: 1000
          })
            </script>";
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>

</html>

<!-- phpbackgroud -->