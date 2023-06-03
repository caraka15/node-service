<?php
session_start();

$db = mysqli_connect("localhost", "root", "caraka1717", "node");

if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = mysqli_real_escape_string($db, $_POST['user']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $stmt = mysqli_prepare($db, "SELECT user, password FROM admin WHERE user = ?");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $user, $hashed_password);
    mysqli_stmt_fetch($stmt);

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user'] = $user;
        header('Location: admin_dashboard.php');
        exit();
    } else {
        $login_error = "Password salah";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($db);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Admin Login</title>
</head>

<body>
    <?php if (isset($login_error)) { ?>
    <p><?php echo $login_error; ?></p>
    <?php } ?>
    <div class="screen-1">
        <img class="logo" src="images/logo.png" alt="Logo">
        <form method="POST" action="admin.php">
            <div class="email">
                <label for="email">Email Address</label>
                <div class="sec-2">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" name="user" placeholder="Username" />
                </div>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <div class="sec-2">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input class="pas" type="password" name="password" placeholder="············" />
                    <ion-icon class="show-hide" name="eye-outline"></ion-icon>
                </div>
            </div>
            <button class="login">Login</button>
        </form>
    </div>
</body>

</html>