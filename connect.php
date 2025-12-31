<?php
$con = mysqli_connect("127.0.0.1", "root", "", "SBM");
// Hide errors in production, log instead
if (!$con) {
    error_log("Failed to connect to MySQL: " . mysqli_connect_error());
    exit("Internal Server Error");
}
?>