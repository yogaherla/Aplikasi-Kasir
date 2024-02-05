<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $produkID = $_GET['id'];

    $query = "DELETE FROM produk WHERE ProdukID='$produkID'";
    $result = mysqli_query($koneksi, $query);

    if($result) {
        header("Location: data_barang.php?pesan=hapus");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID produk tidak ditemukan.";
}
?>
