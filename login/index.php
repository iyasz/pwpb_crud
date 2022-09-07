<?php

include "../koneksi.php";
if (isset($_POST['btn-masuk'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    if ($username == "" or $password == "") {
        $alert = "Masukkan Username dan Password Anda";
    } else {
        $checkUser = mysqli_query($conn, "SELECT * FROM tbl_adm where username = '$username'");
        $checkPass = mysqli_query($conn, "SELECT * FROM tbl_adm where password = '$password'");
        if (mysqli_num_rows($checkUser) <= 0) {
            $alert = "Username Anda Belum Terdaftar";
        } else {
            if (mysqli_num_rows($checkPass) <= 0) {
                $alert = "Password Anda Salah";
            } else {
                header('location: ../index.php');
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
    <title>Login - YaszStorage</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <style>
        .header h1 {
            font-size: 29px;
            font-weight: lighter;
            letter-spacing: 0.6px;
        }

        .button-sec button {
            box-shadow: none;
            padding: 6px 105px;
            border-radius: 3px;
        }

        .alert {
            font-size: 17px;
            padding: 25px 2px;
        }

        .parent {
            position: relative;
            top: 120px;
        }

        .sec-bot p {
            font-size: 14px;
            height: 12px;
            color: darkred;
            margin-top: 4px;
        }

        .inputan input:focus {
            box-shadow: none;
        }

        .inputan input {
            border: none;
            border-bottom: 1px solid gray;
            border-radius: 1px;
        }
        .sec-bot input:focus {
            box-shadow: none;
        }
        .sec-bot label {
            font-size: 14px;
        }
    </style>
    <div class="container parent">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="header text-center mb-4">
                            <h1>Sign In To YaszSupplier</h1>
                        </div>
                        <form action="" method="post">
                            <div class="inputan">

                                <label for="user">Username</label>
                                <input id="user" type="text" autocomplete="off" name="username" class="form-control mb-4">

                                <label for="pw">Password</label>
                                <input id="pw" type="password" name="password" autocomplete="off" class="form-control">
                            </div>
                            <div class="sec-bot mt-2">

                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                    <p><?php if (isset($alert)) {
                                            echo $alert;
                                        } ?></p>
                            </div>
                            <div class="button-sec text-center">
                                <button class="btn btn-primary mt-4" name="btn-masuk">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>