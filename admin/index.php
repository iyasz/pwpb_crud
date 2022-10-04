<?php

include "../koneksi.php";

$admin = $conn->query("SELECT * FROM admin");

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $email = htmlspecialchars($_POST['email']);

    // $simpan = $conn->query("INSERT INTO supplier values (NULL, '$nama','$kontak','$telp','$alamat','$email')");
    $simpan = mysqli_query($conn, "INSERT INTO admin(nama,username,password,telepon,email) VALUES ('$nama','$username','$password','$telepon','$email') ");

    if ($simpan) {
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

    $delete = mysqli_query($conn, "DELETE FROM admin where id = '$id'");

    echo '<script>location.replace("index.php"); </script>';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
    <div class="na navbar navbar-expand-lg bg-dark bg-gradient navbar-dark animate__animated animate__fadeInDown">
        <div class="container-fluid ">
            <a class="navbar-brand h3 mb-0 text-white ps-5" href="../index.php">Yasz Storage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto p-1">
                    <a class="nav-link " aria-current="page" href="../">Home</a>
                    <a class="nav-link" href="../barang/">Barang</a>
                    <a class="nav-link" href="../supplier/">Supplier</a>
                    <a class="nav-link " href="../transaksi/">Transaksi</a>
                    <a class="nav-link active" href="">Admin</a>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h1 class=" text-center mt-5 supp animate__animated animate__fadeInRight">Form Admin</h1>
    </div>
    <div class="container mt-3 supp">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg mb-3 animate__animated animate__fadeInRight">
                    <div class="card-header bg-dark mb-3 ">
                        <h3 class="mb-0 text-white ps-5 animate__animated animate__fadeInRight">Tambah Data Admin</h3>
                    </div>
                    <div class="card-body ">
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Nama <i class='bx bx-user'></i></label>
                                    <input autocomplete="off" type="text" name="nama" placeholder="Nama Supplier" class="form-control mb-3 aa" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Username <i class='bx bx-user-pin'></i></label>
                                    <input type="text" autocomplete="off" name="username" id="kontak" placeholder="Nama Kontak" required class="form-control mb-3 aa">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Password </label>
                                    <input type="text" name="password" required autocomplete="off" id="kontak" placeholder="Nomor Telepon" class="form-control mb-3 aa">
                                </div>
                                <div class="form-group ">
                                    <label for="">Telepon <i class='bx bx-phone'></i></label>
                                    <input type="number" required name="telepon" id="kontak" placeholder="Masukan Alamat" autocomplete="off" class="form-control mb-3 aa">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Email <i class='bx bx-envelope'></i></label>
                                    <input type="text" required name="email" id="kontak" placeholder="Masukan Email" autocomplete="off" class="form-control aa">
                                </div>
                                <p class="text-primary pp"><?php if (isset($alert)) {
                                                                echo $alert;
                                                            } ?></p>
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
        <div class="row justify-content-center mt-5 mb-5">
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>No .Telp</th>
                                    <th>Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($admin as $admins) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $admins['nama'] ?></td>
                                        <td><?= $admins['username'] ?></td>
                                        <td><?= $admins['password'] ?></td>
                                        <td><?= $admins['telepon'] ?></td>
                                        <td><?= $admins['email'] ?></td>
                                        <td class="justify-content-center d-flex gap-1">
                                            <a href="../edit/edit_admin.php?id=<?= $admins['id'] ?> " class="btn btn-primary btn-sm">Edit</a>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $admins['id'] ?>">
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
</body>

</html>

<!-- phpbackgroud -->