<?php
                    include 'api/db.php';

                    // Mengambil data chaind dari tabel
                    $query = "SELECT * FROM chainds WHERE type = 'testnet'";
                    $result = $conn->query($query);

                    // Memeriksa apakah ada data yang ditemukan
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $logo = $row['logo'];
                            $guide_link = $row['guide_link'];
                            $rpc_link = $row['rpc_link'];
                            $stake_link = $row['stake_link'];


                            // Mengambil status dari RPC
                            $rpc_status = @file_get_contents($rpc_link . "/status?");
                            $rpc_status = json_decode($rpc_status);

                            // Memeriksa jika voting_power berisi angka lebih dari 1
                            if ($rpc_status && isset($rpc_status->result->sync_info->catching_up) && $rpc_status->result->sync_info->catching_up == false) {
                                // Menampilkan data chaind aktif
                                echo "<div class='card'>
                                        <div class='card-content'>
                                            <img src='logo/$logo' alt='$name' class='round-image'>
                                            <h2>$name</h2>
                                            <a href='{$stake_link}' class='btn btn-primary' target='_blank'>STAKE </a>
                                            <form action='install.php' method='post' target='_blank'>
                                                <input type='hidden' name='guide_link' value='{$guide_link}'>
                                                <input type='hidden' name='logo' value='{$logo}'>
                                                <input type='hidden' name='name' value='{$name}'>
                                                <button type='submit' class='btn btn-primary' name='install_button'>Guide</button>
                                            </form>
                                            <div class='dot-active'></div>
                                        </div>
                                    </div>";
                            } else {
                                // Menampilkan data chaind tidak aktif
                                echo "<div class='card'>
                                        <div class='card-content'>
                                            <img src='logo/$logo' alt='$name' class='round-image'>
                                            <h2>$name</h2>
                                            <a href='{$stake_link}' class='btn btn-primary' target='_blank'>STAKE </a>
                                            <form action='install.php' method='post' target='_blank'>
                                                <input type='hidden' name='guide_link' value='{$guide_link}'>
                                                <input type='hidden' name='guide_link' value='{$logo}'>
                                                <input type='hidden' name='guide_link' value='{$name}'>
                                                <button type='submit' class='btn btn-primary' name='install_button'>Guide</button>
                                            </form>
                                            <div class='dot-inactive'></div>
                                        </div>
                                    </div>";
                            }
                        }
                    } else {
                        echo "Tidak ada data chaind yang ditemukan.";
                    }

                    // Menutup koneksi database
                    $conn->close();
                    ?>