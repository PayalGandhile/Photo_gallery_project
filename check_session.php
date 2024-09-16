<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['token']) || $_SESSION['token'] != $_COOKIE['token']) {
    // If not logged in, redirect to login page
    header("Location:login_form.php");
    exit();
} else {
    // If logged in, redirect to the home page (index.html)
    header("Location:/Photo_gallery_project/HTMLtemplates/index.html");
    exit();
}
?>
