<?php include '../src/dashboard.php' ?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="../component/css/dashboard.css">
    <link rel="stylesheet" href="../component/css/style.css">


</head>

<body>
    <?php include '../component/includes/navbar_dashboard.html' ?>

    <div class="container">
        <h1>Admin Dashboard</h1>

        <div id="daftar-chaind" class="chaind">
        </div>
        <div class="table-responsive daftar-chaind-container">
            <h2>Daftar Chaind</h2>
            <table class="table table-bordered table-fixed">
                <thead>
                    <tr>
                        <th>Chain ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Logo</th>
                        <th>RPC Link</th>
                        <th>API Link</th>
                        <th>gRPC Link</th>
                        <th>Guide Link</th>
                        <th>Stake Link</th>
                        <th>Snapshot Link</th>
                        <th>Statesync Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['chain_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><img src="../database/logo/<?php echo $row['logo']; ?>" width="50"></td>
                        <td><?php echo $row['rpc_link']; ?></td>
                        <td><?php echo $row['api_link']; ?></td>
                        <td><?php echo $row['grpc_link']; ?></td>
                        <td>
                            <a href="guide/<?php echo $row['guide_link']; ?>" target="_blank">
                                <i class="fas fa-file-alt"></i> Guide Link
                            </a>
                        </td>
                        <td><?php echo $row['stake_link']; ?></td>
                        <td><?php echo $row['snapshot_link']; ?></td>
                        <td><?php echo $row['statesync_link']; ?></td>
                        <td>
                            <form method="POST" action="index.php">
                                <input type="hidden" name="chain_id" value="<?php echo $row['chain_id']; ?>">
                                <button type="submit" name="delete_chaind" class="btn-danger btn-sm"><i
                                        class="fa fa-trash"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Form tambah chaind -->
        <div id="add-chaind" class="chaind">
        </div>
        <div class="add-chaind-container">
            <h2>Tambah Chaind</h2>
            <form method="POST" action="index.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="chain_id">Chain ID:</label>
                    <input type="text" name="chain_id" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" name="type" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="file" name="logo" required class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="rpc_link">RPC Link:</label>
                    <input type="text" name="rpc_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="api_link">API Link:</label>
                    <input type="text" name="api_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="grpc_link">gRPC Link:</label>
                    <input type="text" name="grpc_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="guide_file">Guide File:</label>
                    <input type="file" name="guide_file" required class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="stake_link">Stake Link:</label>
                    <input type="text" name="stake_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="snapshot_link">Snapshot Link:</label>
                    <input type="text" name="snapshot_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="statesync_link">Statesync Link:</label>
                    <input type="text" name="statesync_link" required class="form-control">
                </div>
                <button type="submit" name="add_chaind" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add
                </button>
            </form>
        </div>

        <!-- Form edit chaind -->
        <div id="edit-chaind" class="chaind">
        </div>
        <div class="edit-chaind-container">
            <h2>Edit Chaind</h2>
            <form method="POST" action="index.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="chain_id">Chain ID:</label>
                    <input type="text" name="chain_id" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" name="type" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="file" name="logo" required class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="rpc_link">RPC Link:</label>
                    <input type="text" name="rpc_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="api_link">API Link:</label>
                    <input type="text" name="api_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="grpc_link">gRPC Link:</label>
                    <input type="text" name="grpc_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="guide_file">Guide File:</label>
                    <input type="file" name="guide_file" required class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="stake_link">Stake Link:</label>
                    <input type="text" name="stake_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="snapshot_link">Snapshot Link:</label>
                    <input type="text" name="snapshot_link" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="statesync_link">Statesync Link:</label>
                    <input type="text" name="statesync_link" required class="form-control">
                </div>
                <button type="submit" name="edit_chaind" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </form>
        </div>
    </div>

    <?php include '../../component/includes/footer.php' ?>

</body>

</html>