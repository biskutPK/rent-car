<?php
session_start(); // Start or resume the session

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();
}

// Redirect to the login page
header("Location: login.php");
exit();
?>
