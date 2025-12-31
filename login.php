<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Login Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #B8A099 0%, #9d857c 100%);
            font-family: Arial, sans-serif;
        }
        .login-form {
            text-align: center;
            padding: 40px 30px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
        }
        .login-form h2 {
            color: #B8A099;
            margin-bottom: 30px;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            font-size: 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus {
            border-color: #B8A099;
            outline: none;
        }
        .login-form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 20px 0;
            font-size: 16px;
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            font-weight: 600;
        }
        .login-form input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(184, 160, 153, 0.4);
        }
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 10px;
            padding: 10px;
            background: #ffe5e5;
            border-radius: 5px;
            border-left: 4px solid #dc3545;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
        <form action="checker.php" method="post">
            <input type="text" name="user" placeholder="Enter your username" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="submit" value="Log In">
            
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="error-message">
                    <?php 
                        echo $_SESSION['error_message']; 
                        unset($_SESSION['error_message']);
                    ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>