<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembelian</title>
</head>
<body>
    <h1>Data Penjualan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "kasir2");

            // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
                exit();
            }

            // Query untuk mengambil data pelanggan dan total harga
            $query = "SELECT p.*, COALESCE(SUM(t.Harga), 0) AS TotalHarga
                      FROM pelanggan p
                      LEFT JOIN penjualan t ON p.PelangganID = t.PelangganID
                      GROUP BY p.PelangganID";

            // Eksekusi query
            $result = mysqli_query($koneksi, $query);

            // Periksa apakah ada data yang ditemukan
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                // Tampilkan data pelanggan dan total harga
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['NamaPelanggan'] . "</td>";
                    echo "<td>" . $row['Alamat'] . "</td>";
                    echo "<td>" . $row['NomorTelepon'] . "</td>";
                    echo "<td>" . number_format($row['TotalHarga'], 2) . "</td>"; // Tampilkan total harga dengan format dua desimal
                    echo "<td>";
                    echo "<a href='detail_pembelian.php?PelangganID=" . $row['PelangganID'] . "'>Detail</a> | ";
                    echo "<a href='edit_pembelian.php?PelangganID=" . $row['PelangganID'] . "'>Edit</a> | ";
                    echo "<a href='hapus_pembelian.php?PelangganID=" . $row['PelangganID'] . "'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data pelanggan</td></tr>";
            }

            // Tutup koneksi
            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>
    <a href="tambah_pelanggan.php">Tambah Data Pelanggan</a>
</body>
</html>
