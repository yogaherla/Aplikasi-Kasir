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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
</head>
<body>
    <div class="card mt-2">
        <div class="card-body">
            <!-- Ganti button tambah data menjadi tautan -->
            <a href="tambah_pengguna.php" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="card-body">
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="simpan"){?>
                    <div class="alert alert-success" role="alert">
                        Data Berhasil Di Simpan
                    </div>
                <?php } ?>
                <?php if($_GET['pesan']=="update"){?>
                    <div class="alert alert-success" role="alert">
                        Data Berhasil Di Update
                    </div>
                <?php } ?>
                <?php if($_GET['pesan']=="hapus"){?>
                    <div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                    </div>
                <?php } ?>
            <?php } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Akses Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from petugas");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nama_petugas']; ?></td>
                            <td><?php echo $d['username']; ?></td>
                            <td>
                                <?php 
                                if ($d['level'] == '1') { ?>
                                    Administrator
                                <?php } else { ?>
                                    Petugas
                                <?php } ?>
                            </td>
                            <td>
                                <!-- Tautan untuk mengarahkan pengguna ke halaman edit_pengguna.php dengan menyertakan id_petugas -->
                                <a href="edit_pengguna.php?id_petugas=<?php echo $d['id_petugas']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Tampilkan tautan hapus untuk semua level -->
                                <a href="hapus_pengguna.php?id_petugas=<?php echo $d['id_petugas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Data-->
    <div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Isi modal tambah data -->
    </div>

    <!-- Modal Edit Data -->
    <!-- Daftar modal edit data -->

    <!-- Modal Hapus Data -->
    <!-- Daftar modal hapus data -->

</body>
</html>
