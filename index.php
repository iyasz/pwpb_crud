<?php
include "koneksi.php";
$errs = [];
$olds = [];

// if (isset($_POST['masuk'])) {
//   $username = htmlspecialchars($_POST['username']);
//   $password = htmlspecialchars($_POST['password']);

//   if (empty($username)) {
//     $errs['empty_username'] = "Masukan Username Anda";
//     $select_username = $conn->query("SELECT * FROM admin WHERE username = '$username'")->num_rows;
//   } elseif ($select_username < 1) {
//     $errs['rows_empty_user'] = "Username Anda Tidak Terdaftar!";
//   }


//   if (empty($password)) {
//     $errs['empty_password'] = "Masukan Password Anda";
//     $select_password = $conn->query("SELECT * FROM admin WHERE password = '$password'")->num_rows;
//   } elseif ($select_password < 1) {
//     $errs['rows_empty_pw'] = "Password Anda Salah!";
//     $olds['email'] = $_POST['email'];
//   }

//   if (empty($errs)) {
//     $nav = true;
//   }
// }




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
          <a class="nav-link " href="../rak/">Rak</a>

        </div>
      </div>
    </div>
  </div>
  <!-- end header  -->

  <!-- content  -->
  <!-- <form action="" method="post">

    <div class="modal fade" id="loginPage">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-tittle">Login</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body mx-3">
            <div class="form-group">
              <label for="">Username</label>
              <input name="username" autocomplete="off" class="form-control " type="text" name="" id="">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input class="form-control " autocomplete="off" name="password" type="text" name="" id="">
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="post_masuk">Masuk</button>
          </div>
          <div class="modal-footer justify-content-center">
            <p class="">Copyright All Right Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </form> -->

  <?php
  include "app/views.php";

  ?>

  <!-- end constant -->

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- phpbackgroud -->