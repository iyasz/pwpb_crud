<?php

include "../koneksi.php";

$suppliers = $conn->query("SELECT * FROM barang");
$sups = $conn->query("SELECT * FROM supplier");

if (isset($_POST['submit'])) {
  $kode = htmlspecialchars($_POST['kode']);
  $nama = htmlspecialchars($_POST['nama']);
  $stok = htmlspecialchars($_POST['stok']);
  $harga = htmlspecialchars($_POST['harga']);
  $kadaluwarsa = htmlspecialchars($_POST['kadaluwarsa']);
  $jenis = htmlspecialchars($_POST['jenis']);
  $supp = htmlspecialchars($_POST['suppl']);

  // $simpan = $conn->query("INSERT INTO supplier values (NULL, '$nama','$kontak','$telp','$alamat','$email')");
  if ($jenis == "") {
    echo "<script>alert('Masukan Jenis Barang')</script>";
    echo '<script>location.replace("index.php"); </script>';
  } else {
    $simpan = $conn->query("INSERT INTO barang (kode, nama,stok,harga,kadaluwarsa,jenis_barang,supplier_id) VALUES ('$kode','$nama','$stok','$harga','$kadaluwarsa','$jenis','$supp')");
    $alert = "Data Berhasil Disimpan";
    echo '<script>location.replace("index.php"); </script>';
  }
  // header('location: index.php');

  // if (empty($nama) or empty($kontak) or empty($telp) or empty($alamat) or empty($email)) {
  //     $alert = "Masukan Data dengan lengkap";
  // } else {
  //     $simpan;
  //     echo '<script>location.replace("");</script>';
  // }
}

if (isset($_POST['delete'])) {
  $id = htmlspecialchars($_POST['id']);
  $delete = mysqli_query($conn, "DELETE FROM barang where id = '$id'");

  echo '<script>location.replace("index.php"); </script>';
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
    <h1 class=" text-center mt-5 supp">Form Barang</h1>
  </div>
  <div class="container mt-3 supp">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg mb-3">
          <div class="card-header bg-dark mb-3">
            <h3 class="mb-0 text-white ps-5">Tambah Data Barang</h3>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="row">
                <div class="form-group">
                  <label for="">Kode <i class='bx bx-user'></i></label>
                  <input autocomplete="off" type="text" name="kode" placeholder="Kode Barang" class="form-control mb-3 aa" required>
                </div>
                <div class="form-group">
                  <label for="">Nama <i class='bx bx-user'></i></label>
                  <input autocomplete="off" type="text" name="nama" placeholder="Nama Barang" class="form-control mb-3 aa" required>
                </div>
                <div class="form-group mt-3">
                  <label for="">Stok <i class='bx bx-user-pin'></i></label>
                  <input type="number" autocomplete="off" name="stok" placeholder="Stok Barang" required class="form-control mb-3 aa">
                </div>
                <div class="form-group mt-3">
                  <label for="">Harga <i class='bx bx-phone'></i></label>
                  <input type="number" name="harga" required autocomplete="off" placeholder="Harga Barang" class="form-control mb-3 aa">
                </div>
                <div class="form-group ">
                  <label for="">Kadaluwarsa <i class='bx bx-home-alt-2'></i></label>
                  <input type="date" required name="kadaluwarsa" placeholder="Kadaluwarsa Barang" autocomplete="off" class="form-control mb-3 aa">
                </div>
                <div class="form-group mt-3">
                  <label for="">Jenis Barang <i class='bx bx-envelope'></i></label>
                  <select name="jenis" required class="form-select aa" aria-label="Default select example">
                    <option selected></option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                  </select>
                </div>
                <div class="form-group mt-3">
                  <label for="">Supplier</label>
                  <select name="suppl" required class=" form-select aa" id="">
                    <option selected></option>
                    <?php foreach ($sups as $sup) { ?>
                      <option value="<?= $sup['id'] ?>"><?= $sup['nama'] ?></option>
                    <?php } ?>
                  </select>
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
                  <th>Kode Barang</th>
                  <th>Nama</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Kadaluwarsa</th>
                  <th>Jenis</th>
                  <th>Supplier</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($suppliers as $supplier) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $supplier['kode'] ?></td>
                    <td><?= $supplier['nama'] ?></td>
                    <td><?= $supplier['stok'] ?></td>
                    <td><?= $supplier['harga'] ?></td>
                    <td><?= $supplier['kadaluwarsa'] ?></td>
                    <td><?= $supplier['jenis_barang'] ?></td>
                    <?php
                    $supps = $conn->query("SELECT nama FROM supplier where id = '$supplier[supplier_id]' ")->fetch_assoc();
                    ?>
                    <td><?= $supps['nama'] ?></td>
                    <td class="justify-content-center d-flex gap-1">
                      <a href="../edit/edit_barang.php?id=<?= $supplier['id'] ?> " class="btn btn-primary btn-sm">Edit</a>
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
</body>

</html>

<!-- phpbackgroud -->