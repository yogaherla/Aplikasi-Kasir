<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <div class="sidenav">
        <h2>Sistem Kasir</h2>
        <a href="data_pengguna.php">Data Pengguna</a>
        <a href="data_barang.php">Data Barang</a>
        <a href="pembelian.php">Detail Pembelian</a>
    </div>

    <div class="main">
        <div class="container">
            <h1>Selamat Datang! Admin</h1>
            <div class="grid-container">
                <div class="grid-item">
                    <h2>Data Barang</h2>
                    <div class="card">
                        <div class="card-body">
                            <?php
                            include 'koneksi.php';
                            $data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
                            $jumlah_produk = mysqli_num_rows($data_produk);
                            ?>
                            <h2><?php echo $jumlah_produk; ?></h2>
                            <a href="data_barang.php" class="btn btn-outline-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <h2>Data Pembelian</h2>
                    <div class="card">
                        <div class="card-body">
                            <?php
						include 'koneksi.php';
						$data_penjualan = mysqli_query($koneksi,"SELECT * FROM penjualan");
						$jumlah_penjualan = mysqli_num_rows($data_penjualan);
						?>
						<h2><?php echo $jumlah_penjualan; ?></h2>
						<a href="pembelian.php" class="btn btn-outline-primary btn-sm">lihat</a>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <h2>Data Pengguna</h2>
                    <div class="card">
                        <div class="card-body">
                            <?php
                            include 'koneksi.php';
                            $data_petugas = mysqli_query($koneksi,"SELECT * FROM petugas");
                            $jumlah_petugas = mysqli_num_rows($data_petugas);
                            ?>
                            <h2><?php echo $jumlah_petugas; ?></h2>
                            <a href="data_pengguna.php" class="btn btn-outline-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
