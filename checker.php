<?php
session_start(); // MUST be at the very top

include('connect.php'); // Your database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = $_POST['password']; // Don't escape this, we'll use password_verify
    
    // Query to get user by username only (NOT password)
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Login successful - password matches
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['actor_id'] = $user['actor_id'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['logged_in'] = true;
            
            // Redirect to dashboard or home page
            header("Location: staffmainpage.php");
            exit();
        } else {
            // Password incorrect
            $_SESSION['error_message'] = "Invalid username or password!";
            header("Location: login.php");
            exit();
        }
    } else {
        // Username not found
        $_SESSION['error_message'] = "Invalid username or password!";
        header("Location: login.php");
        exit();
    }
} else {
    // If accessed directly without POST
    header("Location: login.php");
    exit();
}

mysqli_close($con);
?>