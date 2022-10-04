<?php
include "koneksi.php";

if (isset($_POST['btn-sbt'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  if (empty($username) or empty($password)) {
    $alert = "Masukan Username Dan Password";
  } else {
    $userCheck = mysqli_query($conn, "select * from tbl_user where username = '$username'");
    $passCheck = mysqli_query($conn, "select * from tbl_user where password = '$password'");

    if (mysqli_num_rows($userCheck) <= 0) {
      $alert = "Username Anda salah";
    } else {
      if (mysqli_num_rows($passCheck) <= 0) {
        $alert = "Password anda salah";
      } else {
        header('location: ../index.php');
        $alert = "Silahkan Masuk";
      }
    }
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
  <title>Home - Yasz Storage Home</title>
</head>

<body>
  <style>
    .na {
      position: fixed;
      top: 0;
      right: 0;
      z-index: 3;
      left: 0;
    }
  </style>
  <div class="na navbar navbar-expand-lg bg-dark bg-gradient navbar-dark">
    <div class="container-fluid ">
      <a class="navbar-brand h3 mb-0 text-white ps-5" href="">Yasz Storage</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ps-2 p-1">
          <a class="nav-link active" aria-current="page" href="">Home</a>
          <a class="nav-link" href="barang/">Barang</a>
          <a class="nav-link" href="supplier/">Supplier</a>
          <a class="nav-link" href="transaksi/">Transaksi</a>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- phpbackgroud -->