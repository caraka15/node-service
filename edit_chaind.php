<?php
include 'api/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chain_id = $_POST['chain_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $logo = $_POST['logo'];
    $rpc_link = $_POST['rpc_link'];
    $api_link = $_POST['api_link'];
    $grpc_link = $_POST['grpc_link'];
    $guide_link = $_POST['guide_link'];
    $stake_link = $_POST['stake_link'];
    $snapshot_link = $_POST['snapshot_link'];
    $statesync_link = $_POST['statesync_link'];

    // Query untuk mengupdate data pada tabel chainds
    $query = "UPDATE chainds SET chain_id = '$chain_id', name = '$name', type = '$type', logo = '$logo', rpc_link = '$rpc_link', api_link = '$api_link', grpc_link = '$grpc_link', guide_link = '$guide_link', stake_link = '$stake_link', snapshot_link = '$snapshot_link', statesync_link = '$statesync_link' WHERE chain_id = '$chain_id'";
    
    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Redirect kembali ke halaman dashboard setelah berhasil mengupdate data
        header('Location: admin_dashboard.php');
        exit();
    } else {
        // Jika terjadi error, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
