<?php  
require_once "inc/Koneksi.php";
require_once "app/Spp.php";
$data = new App\Spp();

if (session_id() === "") {
    session_start();
}

if (empty($_SESSION["user"])) {
    header("Location: login.php");
}

if (isset($_POST["btn-tambah-petugas"])) {
    $data->tambahPetugas();
    header("Location: index.php?page=data-petugas");
}

if (isset($_POST["btn-update-petugas"])) {
    $data->updatePetugas();
    header("Location: index.php?page=data-petugas");
}

if (isset($_POST["btn-tambah-siswa"])) {
    $data->tambahSiswa();
    header("Location: index.php?page=data-siswa");
}

if (isset($_POST["btn-update-siswa"])) {
    $data->updateSiswa();
    header("Location: index.php?page=data-siswa");
}

if (isset($_POST["btn-tambah-kelas"])) {
    $data->tambahKelas();
    header("Location: index.php?page=data-kelas");
}

if (isset($_POST["btn-update-kelas"])) {
    $data->updateKelas();
    header("Location: index.php?page=data-kelas");
}

if (isset($_POST["btn-tambah-spp"])) {
    $data->tambahSpp();
    header("Location: index.php?page=data-spp");
}

if (isset($_POST["btn-update-spp"])) {
    $data->updateSpp();
    header("Location: index.php?page=data-spp");
}

if (isset($_POST["btn-pembayaran"])) {
    $data->transaksiPembayaran();
    header("Location: index.php?page=pembayaran-spp");
}


?>