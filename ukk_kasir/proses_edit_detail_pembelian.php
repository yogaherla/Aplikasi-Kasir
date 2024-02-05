<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DetailID = $_POST['DetailID'];
    $PelangganID = $_POST['PelangganID'];
    $JumlahProduk = $_POST['JumlahProduk'];
    $JumlahHarga = $_POST['JumlahHarga'];

    $query = mysqli_query($koneksi, "UPDATE detailpenjualan SET JumlahProduk='$JumlahProduk', Subtotal='$JumlahHarga' WHERE DetailID='$DetailID'");

    if ($query) {
        echo "<script>alert('Data berhasil diubah');window.location='detail_pembelian.php?PelangganID=$PelangganID'</script>";
    } else {
        echo "<script>alert('Data gagal diubah');window.location='detail_pembelian.php?PelangganID=$PelangganID'</script>";
    }
}
?>
