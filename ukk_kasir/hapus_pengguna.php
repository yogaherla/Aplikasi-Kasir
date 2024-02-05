<?php
// Mulai sesi jika belum dimulai
session_start();

// Periksa apakah pengguna sudah login sebelum menggunakan $_SESSION['username']
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika pengguna belum login
    header("Location: login.php");
    exit(); // Pastikan untuk keluar dari script setelah mengarahkan pengguna ke halaman login
}

// Koneksi ke database
include 'koneksi.php';

// Periksa apakah ada parameter id_pengguna yang dikirimkan melalui URL
if(isset($_GET['id_petugas'])){
    // Tangkap id_pengguna dari URL
    $id_petugas = $_GET['id_petugas'];

    // Query untuk menghapus data pengguna berdasarkan id_pengguna
    $query = mysqli_query($koneksi,"DELETE FROM petugas WHERE id_petugas='$id_petugas'");

    // Redirect ke halaman data_pengguna.php dengan pesan sukses jika pengguna berhasil dihapus
    if($query){
        header("Location: data_pengguna.php?pesan=hapus");
        exit(); // Pastikan untuk keluar dari script setelah mengarahkan pengguna
    } else {
        // Redirect ke halaman data_pengguna.php dengan pesan gagal jika pengguna gagal dihapus
        header("Location: data_pengguna.php?pesan=gagalhapus");
        exit(); // Pastikan untuk keluar dari script setelah mengarahkan pengguna
    }
} else {
    // Jika tidak ada parameter id_pengguna, redirect ke halaman data_pengguna.php
    header("Location: data_pengguna.php");
    exit(); // Pastikan untuk keluar dari script setelah mengarahkan pengguna
}
?>
