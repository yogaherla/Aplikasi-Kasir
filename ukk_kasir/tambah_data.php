<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div class="container mt-3">
    <h2>Tambah Data Barang</h2>
    <form action="proses_tambah_barang.php" method="POST">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>