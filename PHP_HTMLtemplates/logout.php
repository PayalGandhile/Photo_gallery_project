<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = []; // Clear all session variables

// Destroy the session
session_unset(); // Free all session variables
session_destroy(); // Destroy the session itself
session_write_close(); // Close the session file

// Redirect to the login page or session check page
header("Location: login_form.php"); // Change this if you have a specific page for session checks
exit();
?>
