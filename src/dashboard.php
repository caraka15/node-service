<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

require_once('api/db.php');

// Fungsi untuk menghapus data chaind
function deleteChaind($chain_id) {
    global $conn;

    // Hapus data chaind dari database
    $query = "DELETE FROM chainds WHERE chain_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $chain_id);
    $result = $stmt->execute();

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Proses form delete chaind
if (isset($_POST['delete_chaind'])) {
    $chain_id = $_POST['chain_id'];

    if (deleteChaind($chain_id)) {
        echo "Data chaind berhasil dihapus.";
    } else {
        echo "Gagal menghapus data chaind.";
    }
}

// Query untuk mendapatkan daftar chaind
$query = "SELECT * FROM chainds";
$result = mysqli_query($conn, $query);

// Fungsi untuk mengunggah file
function uploadFile($file, $targetDirectory) {
    $fileName = basename($file['name']);
    $targetPath = $targetDirectory . $fileName;
    
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $fileName;
    } else {
        return false;
    }
}

// Proses form edit chaind
if (isset($_POST['edit_chaind'])) {
    $chain_id = $_POST['chain_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $rpc_link = $_POST['rpc_link'];
    $api_link = $_POST['api_link'];
    $grpc_link = $_POST['grpc_link'];
    $guide_file = $_FILES['guide_file'];
    $stake_link = $_POST['stake_link'];
    $snapshot_link = $_POST['snapshot_link'];
    $statesync_link = $_POST['statesync_link'];
    $logo_file = $_FILES['logo'];

    // Upload file guide
    $guideFileName = uploadFile($guide_file, 'guide/');

    // Upload file logo
    $logoFileName = uploadFile($logo_file, 'logo/');

    if ($guideFileName !== false && $logoFileName !== false) {
        // Memperbarui data chaind ke database dengan guide_link dan logo yang sudah diperbarui
        $query = "UPDATE chainds SET name = ?, type = ?, logo = ?, rpc_link = ?, api_link = ?, grpc_link = ?, guide_link = ?, stake_link = ?, snapshot_link = ?, statesync_link = ? WHERE chain_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssssss", $name, $type, $logoFileName, $rpc_link, $api_link, $grpc_link, $guideFileName, $stake_link, $snapshot_link, $statesync_link, $chain_id);
        $result = $stmt->execute();

        if ($result) {
            echo "Data chaind berhasil diperbarui.";
        } else {
            echo "Gagal memperbarui data chaind.";
        }
    } else {
        echo "Gagal mengunggah file panduan atau logo.";
    }
}

// Proses form add chaind
if (isset($_POST['add_chaind'])) {
    $chain_id = $_POST['chain_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $rpc_link = $_POST['rpc_link'];
    $api_link = $_POST['api_link'];
    $grpc_link = $_POST['grpc_link'];
    $guide_file = $_FILES['guide_file'];
    $stake_link = $_POST['stake_link'];
    $snapshot_link = $_POST['snapshot_link'];
    $statesync_link = $_POST['statesync_link'];
    $logo_file = $_FILES['logo'];

    // Upload file guide
    $guideFileName = uploadFile($guide_file, 'guide/');

    // Upload file logo
    $logoFileName = uploadFile($logo_file, 'logo/');

    if ($guideFileName !== false && $logoFileName !== false) {
        // Menambahkan data chaind ke database dengan guide_link dan logo yang sudah diperbarui
        $query = "INSERT INTO chainds (chain_id, name, type, logo, rpc_link, api_link, grpc_link, guide_link, stake_link, snapshot_link, statesync_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssssss", $chain_id, $name, $type, $logoFileName, $rpc_link, $api_link, $grpc_link, $guideFileName, $stake_link, $snapshot_link, $statesync_link);
        $result = $stmt->execute();

        if ($result) {
            echo "Data chaind berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan data chaind.";
        }
    } else {
        echo "Gagal mengunggah file panduan atau logo.";
    }
}
?>