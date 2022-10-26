<?php
include "../koneksi.php";

$barang = $conn->query("SELECT * FROM barang");
$admin = $conn->query("SELECT * FROM admin");
$transaksi = $conn->query("SELECT * FROM transaksi");
$transaksif = $conn->query("SELECT status FROM transaksi");
$rak = $conn->query("SELECT * FROM rak");

if (isset($_POST['submit'])) {
    $admin = htmlspecialchars($_POST['admin']);
    $namabarang = htmlspecialchars($_POST['namabarang']);
    $tgltr = htmlspecialchars($_POST['tgltr']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $status = htmlspecialchars($_POST['status']);
    $tipe = htmlspecialchars($_POST['tipe']);

    // $simpan = $conn->query("INSERT INTO supplier values (NULL, '$nama','$kontak','$telp','$alamat','$email')");
    if ($tipe == "masuk") {
        $selectBrg = $conn->query("SELECT * FROM barang WHERE id = '$namabarang'")->fetch_assoc();

        $simpanTransaksi = $conn->query("INSERT INTO transaksi (id_admin, barang_id,tgl_transaksi,jumlah,status,tipe) VALUES ('$admin','$namabarang','$tgltr','$jumlah','$status','$tipe')");


        $masukBrgStok = $selectBrg['stok_masuk'] + $jumlah;
        $updateBrg = $conn->query("UPDATE barang SET stok_masuk = '$masukBrgStok' WHERE id = '$selectBrg[id]'");
        echo '<script>alert("Data Transaksi Disimpan"); 
                        location.replace("index.php"); </script>';
    } elseif ($tipe == "keluar") {
        $selectBrg = $conn->query("SELECT * FROM barang WHERE id = '$namabarang'")->fetch_assoc();

        $totalHarga = $selectBrg['harga'] * $jumlah;

        $simpanTransaksi = $conn->query("INSERT INTO transaksi (id_admin, barang_id,tgl_transaksi,jumlah,total_harga,status,tipe) VALUES ('$admin','$namabarang','$tgltr','$jumlah','$totalHarga','$status','$tipe')");


        $kurangBrgStok = $selectBrg['stok_masuk'] - $jumlah;
        $keluarBrgStok = $selectBrg['stok_keluar'] + $jumlah;
        $updateBrg = $conn->query("UPDATE barang SET stok_masuk = '$kurangBrgStok', stok_keluar = '$keluarBrgStok' WHERE id = '$selectBrg[id]'");
        echo '<script>alert("Data Transaksi Disimpan"); 
                        location.replace("index.php"); </script>';
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
    $delete = mysqli_query($conn, "DELETE FROM transaksi where id = '$id'");

    echo '<script>location.replace("index.php"); </script>';
}

// if (isset($_POST['hitung'])) {
//     $namabarang = htmlspecialchars($_POST['namabarang']);
//     $jumlah = htmlspecialchars($_POST['jumlah']);
//     $total = htmlspecialchars($_POST['total']);
//     $hargaBrg = $conn->query("SELECT * FROM barang WHERE id = '$namabarang'")->fetch_assoc();

//     $aritmatika = $jumlah * $hargaBrg['harga'];
// }

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Transaksi - Yasz Storage</title>
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
    <div class="na navbar navbar-expand-lg bg-dark bg-gradient navbar-dark">
        <div class="container-fluid ">
            <a class="navbar-brand h3 mb-0 text-white ps-5" href="">Yasz Storage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto p-1">
                    <a class="nav-link " aria-current="page" href="../">Home</a>
                    <a class="nav-link" href="../barang/">Barang</a>
                    <a class="nav-link" href="../supplier/">Supplier</a>
                    <a class="nav-link active" href="">Transaksi</a>
                    <a class="nav-link " href="../admin/">Admin</a>
                </div>
            </div>
        </div>
    </div>



    <div class="mt-5">
        <h1 class=" text-center mt-5 supp animate__animated animate__fadeInRight">Form Transaksi</h1>
    </div>
    <div class="container-fluid mt-3 supp">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg mb-3 animate__animated animate__fadeInRight">
                    <div class="card-header bg-dark mb-3 ">
                        <h3 class="mb-0 text-white ps-5 animate__animated animate__fadeInRight">Tambah Data Transaksi</h3>
                    </div>
                    <div class="card-body ">
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="">Admin <i class='bx bx-user'></i></label>
                                    <select name="admin" required class=" form-select aa" id="">
                                        <option value="" selected></option>
                                        <?php foreach ($admin as $adm) { ?>
                                            <option value="<?= $adm['id'] ?>"><?= $adm['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Nama Barang <i class='bx bx-user'></i></label>
                                    <select name="namabarang" required class=" form-select aa" id="">
                                        <option value="" selected></option>
                                        <?php foreach ($barang as $brg) { ?>
                                            <option value="<?= $brg['id'] ?>"><?= $brg['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="">Tanggal Transaksi <i class='bx bx-home-alt-2'></i></label>
                                    <input type="date" required name="tgltr" placeholder="Kadaluwarsa Barang" autocomplete="off" class="form-control mb-3 aa">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah <i class='bx bx-envelope'></i></label>
                                    <input autocomplete="off" type="number" name="jumlah" id="jml" placeholder="Jumlah Barang" class="form-control mb-3 aa" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Status <i class='bx bx-envelope'></i></label>
                                    <select name="status" required class="form-select aa" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="Pending">Pending</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Success">Success</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Tipe <i class='bx bx-envelope'></i></label>
                                    <select name="tipe" required class="form-select aa" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="masuk">Masuk</option>
                                        <option value="keluar">Keluar</option>
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
                                    <th>Admin</th>
                                    <th>Barang</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jumlah</th>
                                    <th>Totaal Harga</th>
                                    <th>Status</th>
                                    <th>Tipe</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($transaksi as $transak) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <?php $selectNamaAdm = $conn->query("SELECT * FROM admin WHERE id = $transak[id_admin]")->fetch_assoc();

                                        $selectNamaBrg = $conn->query("SELECT * FROM barang WHERE id = $transak[barang_id]")->fetch_assoc(); ?>

                                        <td><?= $selectNamaAdm['nama'] ?></td>
                                        <td><?= $selectNamaBrg['nama'] ?></td>
                                        <td><?= $transak['tgl_transaksi'] ?></td>
                                        <?php $selectBrg = $conn->query("SELECT * FROM barang WHERE id = '$transak[barang_id]'")->fetch_assoc() ?>
                                        <td><?= $transak['jumlah'] ?></td>
                                        <td><?= $transak['total_harga'] ?></td>
                                        <td><?= $transak['status'] ?></td>
                                        <td><?= $transak['tipe'] ?></td>
                                        <td class="justify-content-center d-flex gap-1">
                                            <a href="../edit/edit_admin.php?id=<?= $transak['id'] ?> " class="btn btn-primary btn-sm">Edit</a>
                                            <form action="" method="post">
                                                <?php $selectRak = $conn->query("SELECT * FROM rak ") ?>
                                                <input type="hidden" name="id" value="<?= $transak['id'] ?>">
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

    <script src="../app/script.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <?php
    // $namabarang = htmlspecialchars($_POST['namabarang']);
    // $selectBrg = $conn->query("SELECT * FROM barang WHERE id = '$namabarang'")->fetch_assoc();

    ?>
    <script>
        // const jumlah = document.getElementById("jml").value;
        // const total = document.getElementById("total");
        // const harga = <?= $selectBrg['harga'] ?>;

        // // jumlah.addEventListener("keyup", () => {
        // //   jumlah * jumlah = total;
        // // });
        // function totalharga() {
        //     total.value = jumlah * harga;
        // }
    </script>
</body>

</html>

<!-- phpbackgroud -->