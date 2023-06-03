<?php

include 'api/db.php';

session_start();
session_destroy();
header('Location: admin.php');
exit();
?>
