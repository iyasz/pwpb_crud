<?php

include "../koneksi.php";

$id = $_GET['id'];
$datas = $conn->query("SELECT * FROM barang WHERE id = '$id'")->fetch_assoc();

if (isset($_POST['submit'])) {
    $kode = htmlspecialchars($_POST['kode']);
    $nama = htmlspecialchars($_POST['nama']);
    $stok = htmlspecialchars($_POST['stok']);
    $harga = number_format($_POST['harga']);
    $kadaluwarsa = htmlspecialchars($_POST['kadaluwarsa']);
    $jenis = htmlspecialchars($_POST['jenis']);



    if ($jenis == "") {
        echo "<script>alert('Masukan Jenis Barang')</script>";
        echo '<script>location.replace("edit_barang.php"); </script>';
    } else {
        $update = $conn->query("UPDATE barang SET kode = '$kode', nama = '$nama', stok = '$stok', harga = '$harga', kadaluwarsa = '$kadaluwarsa', jenis_barang = '$jenis' WHERE id = '$id'");
        $alert = "Data Berhasil Disimpan";
        echo '<script>location.replace("../barang/index.php"); </script>';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Barang - Yasz Storage Barang</title>
</head>

<body>
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
    </style>
    <fiv class=" na navbar navbar-expand-lg bg-dark bg-gradient navbar-dark">
        <div class="container-fluid ">
            <a class="navbar-brand h3 mb-0 text-white ps-5" href="../index.php">Yasz Storage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto p-1">
                    <a class="nav-link " aria-current="page" href="../">Home</a>
                    <a class="nav-link active" href="">Barang</a>
                    <a class="nav-link" href="../supplier">Supplier</a>
                    <a class="nav-link " href="../transaksi/">Transaksi</a>
                    <a class="nav-link " href="../admin/">Admin</a>
                </div>
            </div>
        </div>
    </fiv>

    <div class="mt-5">
        <h1 class=" text-center mt-5 supp">Form Edit Barang</h1>
    </div>
    <div class="container mt-3 supp">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg mb-3">
                    <div class="card-header bg-dark mb-3">
                        <h3 class="mb-0 text-white ps-5">Update Data Supplier</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Kode <i class='bx bx-user'></i></label>
                                    <input autocomplete="off" type="text" value="<?= $datas['kode'] ?>" name="kode" placeholder="Kode Barang" class="form-control mb-3 aa" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama <i class='bx bx-user'></i></label>
                                    <input autocomplete="off" type="text" name="nama" value="<?= $datas['nama'] ?>" placeholder="Nama Barang" class="form-control mb-3 aa" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Stok <i class='bx bx-user-pin'></i></label>
                                    <input type="number" autocomplete="off" name="stok" value="<?= $datas['stok'] ?>" placeholder="Stok Barang" required class="form-control mb-3 aa">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Harga <i class='bx bx-phone'></i></label>
                                    <input type="number" name="harga" required autocomplete="off" value="<?= $datas['harga'] ?>" placeholder="Harga Barang" class="form-control mb-3 aa">
                                </div>
                                <div class="form-group ">
                                    <label for="">Kadaluwarsa <i class='bx bx-home-alt-2'></i></label>
                                    <input type="date" required name="kadaluwarsa" placeholder="Kadaluwarsa Barang" value="<?= $datas['kadaluwarsa'] ?>" autocomplete="off" class="form-control mb-3 aa">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Jenis Barang <i class='bx bx-envelope'></i></label>
                                    <select name="jenis" class="form-select aa" aria-label="Default select example">
                                        <option selected></option>
                                        <option <?php if ($datas['jenis_barang'] == "makanan") {
                                                    echo "selected";
                                                } ?> value="makanan">Makanan</option>
                                        <option <?php if ($datas['jenis_barang'] == "minuman") {
                                                    echo "selected";
                                                } ?> value="minuman">Minuman</option>
                                    </select>
                                </div>
                                <p class="text-primary pp"><?php if (isset($alert)) {
                                                                echo $alert;
                                                            } ?></p>
                                <div class="form-group text-end mt-4">
                                    <button class="btn btn-primary mt-4 btn-st" type="submit" name="submit">Submit</button>

                                    <button class="btn btn-danger mt-4" type="reset" name="btn-reset">Reset</button>
                                    <a href="../barang/index.php" class="mt-4 btn btn-info">Kembali</a>
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
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- phpbackgroud -->