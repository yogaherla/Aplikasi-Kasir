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

// Periksa apakah parameter id_pengguna telah diterima dari halaman sebelumnya
if (isset($_POST['id_pengguna'])) {
    // Tangkap data yang dikirimkan melalui metode POST
    $id_pengguna = $_POST['id_pengguna'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password']; // perhatikan ini hanya contoh, biasanya tidak disarankan mengubah password dari halaman edit
    $level = $_POST['level'];

    // Query untuk memperbarui data pengguna berdasarkan id_pengguna
    $query = "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', password='$password', level='$level' WHERE id_pengguna='$id_pengguna'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman data_pengguna.php dengan pesan sukses
        header("Location: data_pengguna.php?pesan=update");
        exit();
    } else {
        // Redirect kembali ke halaman data_pengguna.php dengan pesan gagal
        header("Location: data_pengguna.php?pesan=gagal");
        exit();
    }
} else {
    // Jika parameter id_pengguna tidak diterima, redirect ke halaman data_pengguna.php
    header("Location: data_pengguna.php");
    exit();
}
?>
