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

// Ambil nilai yang dikirimkan melalui formulir tambah data
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password']; // Pastikan untuk melakukan hashing password sebelum menyimpannya di database
$level = $_POST['level'];

// Lakukan proses penambahan data petugas ke database
$query = "INSERT INTO petugas (nama_petugas, username, password, level) VALUES ('$nama_petugas', '$username', '$password', '$level')";
$result = mysqli_query($koneksi, $query);

// Periksa apakah proses penambahan berhasil
if ($result) {
    // Jika berhasil, redirect ke halaman data petugas dengan pesan sukses
    header("Location: data_pengguna.php?pesan=simpan");
} else {
    // Jika gagal, redirect ke halaman data petugas dengan pesan error
    header("Location: data_pengguna.php?pesan=gagal");
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
