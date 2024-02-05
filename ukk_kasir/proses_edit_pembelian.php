<?php 
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PelangganID = $_POST['PelangganID'];
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $NomorTelepon = $_POST['NomorTelepon'];
    $Alamat = $_POST['Alamat'];

    $query = mysqli_query($koneksi, "UPDATE pelanggan SET NamaPelanggan='$NamaPelanggan', NomorTelepon='$NomorTelepon', Alamat='$Alamat' WHERE PelangganID='$PelangganID'");
    
    if ($query) {
        echo "<script>alert('Data berhasil diubah');window.location='pembelian.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah');window.location='pembelian.php'</script>";
    }
}
?>
