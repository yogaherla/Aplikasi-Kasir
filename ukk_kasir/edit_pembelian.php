<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php 
include 'koneksi.php';

// Periksa apakah parameter PelangganID ada dan tidak kosong
if (isset($_GET['PelangganID']) && !empty($_GET['PelangganID'])) {
    $PelangganID = $_GET['PelangganID'];
    
    // Query database
    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID WHERE pelanggan.PelangganID='$PelangganID'");
    
    // Periksa apakah data ditemukan
    if ($query && $data = mysqli_fetch_array($query)) {
?>

    <div class="card mt-2">
        <div class="card-body">
            <form action="proses_edit_pembelian.php" method="POST">
                <input type="hidden" name="PelangganID" value="<?php echo $data['PelangganID']; ?>">
                <div class="form-group">
                    <label for="NamaPelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" value="<?php echo $data['NamaPelanggan']; ?>">
                </div>
                <div class="form-group">
                    <label for="NomorTelepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="NomorTelepon" name="NomorTelepon" value="<?php echo $data['NomorTelepon']; ?>">
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?php echo $data['Alamat']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>

<?php
    } else {
        echo "Data pelanggan tidak ditemukan.";
    }
} else {
    echo "Parameter PelangganID tidak valid.";
}
?>
</body>
</html>
