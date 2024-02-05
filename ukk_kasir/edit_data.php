<?php

if(isset($_GET['id'])) {
    $produkID = $_GET['id'];
    include 'koneksi.php';
    $query = "SELECT * FROM produk WHERE ProdukID='$produkID'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div class="container mt-3">
    <h2>Edit Data Barang</h2>
    <form action="proses_edit_barang.php" method="POST">
        <input type="hidden" name="produkID" value="<?php echo $data['ProdukID']; ?>">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $data['NamaProduk']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $data['Harga']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $data['Stok']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>