<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Pembelian</title>
</head>
<body>
    <?php
    // Periksa apakah parameter PelangganID ada dalam URL
    if (isset($_GET['PelangganID']) && !empty($_GET['PelangganID'])) {
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "kasir2");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }

        // Ambil PelangganID dari parameter URL
        $PelangganID = $_GET['PelangganID'];

        // Query untuk menghapus data pelanggan berdasarkan PelangganID
        $query = "DELETE FROM pelanggan WHERE PelangganID = '$PelangganID'";

        // Eksekusi query
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah query berhasil dijalankan
        if ($result) {
            echo "Data pelanggan berhasil dihapus.";
        } else {
            echo "Gagal menghapus data pelanggan: " . mysqli_error($koneksi);
        }

        // Tutup koneksi
        mysqli_close($koneksi);
    } else {
        echo "Parameter PelangganID tidak valid.";
    }
    ?>
</body>
</html>
