<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Main page content for authenticated users
echo "Welcome, " . $_SESSION['username'];
?>
