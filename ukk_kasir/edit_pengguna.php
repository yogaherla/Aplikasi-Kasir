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

    // Query untuk mengambil data pengguna berdasarkan id_pengguna
    $query = mysqli_query($koneksi,"SELECT * FROM petugas WHERE id_petugas='$id_petugas'");
    $data = mysqli_fetch_array($query);
} else {
    // Jika tidak ada parameter id_pengguna, redirect ke halaman data_pengguna.php
    header("Location: data_pengguna.php");
    exit(); // Pastikan untuk keluar dari script setelah mengarahkan pengguna
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form action="proses_edit_pengguna.php" method="POST">
        <input type="hidden" name="id_petugas" value="<?php echo $data['id_petugas']; ?>">
        <label for="nama_pengguna">Nama Pengguna:</label><br>
        <input type="text" id="nama_petugas" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>"><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
