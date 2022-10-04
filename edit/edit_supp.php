<?php

include "../koneksi.php";

$id = $_GET['id'];

$data = $conn->query("SELECT * FROM supplier WHERE id = '$id'");

$datas = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $kontak = htmlspecialchars($_POST['kontak']);
    $telp = htmlspecialchars($_POST['telp']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $email = htmlspecialchars($_POST['email']);

    $update = $conn->query("UPDATE supplier SET nama = '$nama', kontak = '$kontak', telp = '$telp', alamat = '$alamat', email = '$email'");
    if ($update == TRUE) {
        echo '<script>alert("Data Berhasil Di Ubah");
        location.replace("../supplier/index.php"); </script>';
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
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Supplier - Yasz Storage Supplier</title>
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
                <div class="navbar-nav ps-2 p-1">
                    <a class="nav-link " aria-current="page" href="../">Home</a>
                    <a class="nav-link" href="../barang/">Barang</a>
                    <a class="nav-link active" href="">Supplier</a>
                    <a class="nav-link " href="../transaksi/">Transaksi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h1 class=" text-center mt-5 supp">Form Supplier</h1>
    </div>
    <div class="container mt-3 supp">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg mb-3">
                    <div class="card-header bg-dark mb-3">
                        <h3 class="mb-0 text-white ps-5">Update Data Supplier</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama <i class='bx bx-user'></i></label>
                                        <input autocomplete="off" type="text" name="nama" placeholder="Nama Supplier" class="form-control mb-3 aa" value="<?= $datas['nama'] ?>" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Kontak <i class='bx bx-user-pin'></i></label>
                                        <input type="text" value="<?= $datas['kontak'] ?>" autocomplete=" off" name="kontak" id="kontak" placeholder="Nama Kontak" required class="form-control mb-3 aa">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">No. Telepon <i class='bx bx-phone'></i></label>
                                        <input type="number" value="<?= $datas['telp'] ?>" name=" telp" required autocomplete="off" id="kontak" placeholder="Nomor Telepon" class="form-control mb-3 aa">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="">Alamat <i class='bx bx-home-alt-2'></i></label>
                                        <input type="text" required name="alamat" id="kontak" placeholder="Masukan Alamat" autocomplete="off" value="<?= $datas['alamat'] ?>" class=" form-control mb-3 aa">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Email <i class='bx bx-envelope'></i></label>
                                        <input type="text" required name="email" id="kontak" placeholder="Masukan Email" autocomplete="off" value="<?= $datas['email'] ?>" class=" form-control aa">
                                    </div>
                                    <p class="text-primary pp"><?php if (isset($alert)) {
                                                                    echo $alert;
                                                                } ?></p>
                                    <div class="form-group text-end mt-4">
                                        <button class="btn btn-primary mt-4 btn-st" type="submit" name="submit">Submit</button>

                                        <button class="btn btn-danger mt-4" type="reset" name="btn-reset">Reset</button>
                                    </div>
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