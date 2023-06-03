<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

require_once('api/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chain_id = $_POST['chain_id'];

    // Hapus data chaind dari database
    $query = "DELETE FROM chainds WHERE chain_id = '$chain_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Gagal menghapus data chaind.";
    }
}

mysqli_close($conn);
?>
