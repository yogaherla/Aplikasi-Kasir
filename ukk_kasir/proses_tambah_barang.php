<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$nama_produk', '$harga', '$stok')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: data_barang.php?pesan=simpan");
        exit();
    } else {
        echo "Gagal menambahkan data barang.";
    }
}
?>
