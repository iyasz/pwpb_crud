<?php
include "koneksi.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/img/logo/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="app/style.css">
  <title>Home - Yasz Storage Home</title>
</head>

<body>
  <style>
    .container {
      position: relative;
      top: 120px;
    }

    .na {
      position: fixed;
      top: 0;
      right: 0;
      z-index: 3;
      left: 0;
    }

    .card {
      border: none;
    }

    .bg-pr {
      background-color: #404142;
    }
  </style>
  <!-- header -->
  <div class="na navbar navbar-expand-lg bg-dark bg-gradient navbar-dark">
    <div class="container-fluid ">
      <a class="navbar-brand h3 mb-0 text-white ps-5" href="">Yasz Storage</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav p-1 mx-auto">
          <a class="nav-link active" href="">Home</a>
          <a class="nav-link" href="barang/">Barang</a>
          <a class="nav-link" href="supplier/">Supplier</a>
          <a class="nav-link" href="transaksi/">Transaksi</a>
          <a class="nav-link" href="admin/">Admin</a>

        </div>
        <div class="navbar-nav p-1 text-center">
          <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#loginPage">Login</a>
        </div>
      </div>
    </div>
  </div>
  <!-- end header  -->

  <!-- content  -->

  <div class="modal fade" id="loginPage">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-tittle">Login</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input class="form-control" type="text" name="" id="">
            <label for="">Anime</label>
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="" id="">
            <label for="">Anime</label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include "app/views.php";

  ?>

  <!-- end constant -->

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- phpbackgroud -->