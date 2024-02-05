<?php
session_start();

if (!isset($_SESSION['id_petugas'])) {
    header("Location: login.php");
    exit();
}

$level = $_SESSION['level'];
if ($level == '1') {
    // Level Administrator
    header("Location: dashboard_admin.php");
} elseif ($level == '2') {
    // Level Petugas
    header("Location: dashboard_petugas.php");
} else {
    // Jika level tidak diketahui, logout dan redirect ke halaman login
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
