<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produkID = $_POST['produkID'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "UPDATE produk SET NamaProduk='$nama_produk', Harga='$harga', Stok='$stok' WHERE ProdukID='$produkID'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: data_barang.php?pesan=update");
        exit();
    } else {
        echo "Gagal memperbarui data barang.";
    }
}
?>
