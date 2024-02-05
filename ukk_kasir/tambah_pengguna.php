<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Petugas</title>
</head>
<body>
    <h1>Tambah Data Petugas</h1>
    <form action="proses_tambah_pengguna.php" method="POST">
        <label for="nama_petugas">Nama Petugas:</label><br>
        <input type="text" id="nama_petugas" name="nama_petugas"><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="level">Level:</label><br>
        <select id="level" name="level">
            <option value="1">Administrator</option>
            <option value="2">Petugas</option>
        </select><br><br>
        <input type="submit" value="Tambah Data">
    </form>
</body>
</html>
