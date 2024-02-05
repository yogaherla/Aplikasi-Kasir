<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelanggan</title>
</head>
<body>
    <h1>Tambah Data Pelanggan</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="NamaPelanggan">Nama Pelanggan:</label><br>
        <input type="text" id="NamaPelanggan" name="NamaPelanggan"><br>
        <label for="Alamat">Alamat:</label><br>
        <textarea id="Alamat" name="Alamat"></textarea><br>
        <label for="NomorTelepon">Nomor Telepon:</label><br>
        <input type="text" id="NomorTelepon" name="NomorTelepon"><br><br>
        <input type="submit" value="Simpan" name="submit">
    </form>

    <?php
    // Proses penyimpanan data jika form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "kasir2");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }

        // Ambil data yang dikirimkan melalui form
        $NamaPelanggan = $_POST['NamaPelanggan'];
        $Alamat = $_POST['Alamat'];
        $NomorTelepon = $_POST['NomorTelepon'];

        // Query untuk menyimpan data pelanggan ke dalam database
        $query = "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES ('$NamaPelanggan', '$Alamat', '$NomorTelepon')";

        // Eksekusi query
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah query berhasil dijalankan
        if ($result) {
            echo "Data pelanggan berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan data pelanggan: " . mysqli_error($koneksi);
        }

        // Tutup koneksi
        mysqli_close($koneksi);
    }
    ?>
</body>
</html>
