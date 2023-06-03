<?php

// Check if the user is logged in 
if (!isset($_SESSION['user'])) { 
    // User is not logged in, redirect to login page 
    header('Location: admin.php'); 
    exit(); 
}

?>