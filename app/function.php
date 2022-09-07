<?php


function selectByFunc(){
    global $conn;
    $selectId = mysqli_query($conn, "SELECT id FROM supplier");
    $selectNama = mysqli_query($conn, "SELECT nama FROM supplier");
    $selectKontak = mysqli_query($conn, "SELECT kontak FROM supplier");
    $selectTelp = mysqli_query($conn, "SELECT telp FROM supplier");
    $selectAlamat = mysqli_query($conn, "SELECT alamat FROM supplier");
    $selectEmail = mysqli_query($conn, "SELECT email FROM supplier");
} 

?>