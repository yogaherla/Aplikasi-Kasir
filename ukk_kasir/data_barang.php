<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='tambah_data.php'">
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="simpan"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Simpan
                </div>
            <?php } ?>
            <?php if($_GET['pesan']=="update"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Update
                </div>
            <?php } ?>
            <?php if($_GET['pesan']=="hapus"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Hapus
                </div>
            <?php } ?>
            <?php 
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from produk");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['NamaProduk']; ?></td>
                        <td>Rp. <?php echo $d['Harga']; ?></td>
                        <td><?php echo $d['Stok']; ?></td>
                        <td>
                            <a href="edit_data.php?id=<?php echo $d['ProdukID']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $d['ProdukID']; ?>)">Hapus</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(produkID) {
        if (confirm("Apakah Anda yakin akan menghapus data ini?")) {
            window.location.href = "hapus_data.php?id=" + produkID;
        }
    }
</script>
<a href="dashboard_admin.php">Kembali</a>
</body>
</html>