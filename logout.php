<?php
// Start PHP session
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("location:index.php");
    exit();
}

// Destroy all session data
session_destroy();

// Redirect to the login page
header("location: index.php");
exit();
?>
