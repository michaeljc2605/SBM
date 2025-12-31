<?php
session_start();

// Initialize variables for messages
$successMessage = "";
$errorMessage = "";

// Directory to upload files
$uploadDirectory = "/Applications/XAMPP/xamppfiles/htdocs/SBM/tumbal/";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if files are uploaded
    if (isset($_FILES['ijazah']) && isset($_FILES['resume'])) {
        // Get file details
        $ijazahFile = $_FILES['ijazah'];
        $resumeFile = $_FILES['resume'];

        // Check for upload errors
        if ($ijazahFile['error'] === 0 && $resumeFile['error'] === 0) {
            // Validate file types (only PDF files)
            $allowedType = 'application/pdf';
            if ($ijazahFile['type'] === $allowedType && $resumeFile['type'] === $allowedType) {
                // Generate unique filenames
                $ijazahFileName = pathinfo($ijazahFile['name'], PATHINFO_FILENAME) . '_' . uniqid() . '.pdf';
                $resumeFileName = pathinfo($resumeFile['name'], PATHINFO_FILENAME) . '_' . uniqid() . '.pdf';

                // Full paths for the uploaded files
                $ijazahFilePath = $uploadDirectory . $ijazahFileName;
                $resumeFilePath = $uploadDirectory . $resumeFileName;

                // Move the uploaded files to the specified directory
                if (move_uploaded_file($ijazahFile['tmp_name'], $ijazahFilePath) && 
    move_uploaded_file($resumeFile['tmp_name'], $resumeFilePath)) {
    // Success message with links to the uploaded files
    $successMessage = "Files uploaded successfully!";
    echo "Ijazah uploaded successfully: <a href='/SBM/tumbal/$ijazahFileName' target='_blank'>View Ijazah</a><br>";
    echo "Resume uploaded successfully: <a href='/SBM/tumbal/$resumeFileName' target='_blank'>View Resume</a>";
}else {
                    $errorMessage = "Failed to move the uploaded files.";
                }
            } else {
                $errorMessage = "Only PDF files are allowed.";
            }
        } else {
            $errorMessage = "Error uploading files. Please try again.";
        }
    } else {
        $errorMessage = "Both ijazah and resume files are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Ijazah and Resume</title>
    <style>
        /* Styling for the form and messages */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #FFC3A0, #FFFFFF);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .card h1 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .success, .error {
            text-align: center;
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Upload Files</h1>
        <?php if ($successMessage): ?>
            <div class="success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <?php if ($errorMessage): ?>
            <div class="error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <form action="thankyou.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ijazah">Ijazah (PDF):</label>
                <input type="file" id="ijazah" name="ijazah" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="resume">Resume (PDF):</label>
                <input type="file" id="resume" name="resume" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
