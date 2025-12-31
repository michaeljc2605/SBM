<?php
session_start();

// Include the database connection file
include('connect.php');

// Initialize variables for messages
$successMessage = "";
$errorMessage = "";

// Check if the job details are set in the URL
if (isset($_GET['job_id']) && isset($_GET['role_name']) && isset($_GET['role_description']) && isset($_GET['requirements']) && isset($_GET['location']) && isset($_GET['salary_range'])) {
    $jobId = $_GET['job_id'];
    $roleName = $_GET['role_name'];
    $roleDescription = $_GET['role_description'];
    $requirements = $_GET['requirements'];
    $location = $_GET['location'];
    $salaryRange = $_GET['salary_range'];
} else {
    $errorMessage = "No job details available.";
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $umur = intval($_POST['umur']);
    $KTPnumber = mysqli_real_escape_string($con, $_POST['KTPnumber']);
    $SIMnumber = !empty($_POST['SIMnumber']) ? mysqli_real_escape_string($con, $_POST['SIMnumber']) : NULL;
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $address = !empty($_POST['address']) ? mysqli_real_escape_string($con, $_POST['address']) : NULL;

    // Insert data into the applicant table if no errors
    if (empty($errorMessage)) {
        $query = "INSERT INTO applicant (job_id, nama, umur, KTPnumber, SIMnumber, email, phone_number, address)
          VALUES ('$jobId', '$nama', $umur, '$KTPnumber', '$SIMnumber', '$email', '$phone_number', '$address')";

        if (mysqli_query($con, $query)) {
            $successMessage = "Applicant added successfully!";
        } else {
            $errorMessage = "Error: " . mysqli_error($con);
        }
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Applicant</title>
    <style>
        /* Styling for the form and messages */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #A3B5CC, #FFFFFF);
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
        .form-group input, .form-group textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: none;
        }
        .form-group input[type="file"] {
            padding: 5px;
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
        <h1>Apply for Job: <?php echo htmlspecialchars($roleName); ?></h1>
        <?php if ($successMessage): ?>
            <div class="success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <?php if ($errorMessage): ?>
            <div class="error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <form action="jobapplinext.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?php echo htmlspecialchars($jobId); ?>">
            <input type="hidden" name="role_name" value="<?php echo htmlspecialchars($roleName); ?>">
            <input type="hidden" name="role_description" value="<?php echo htmlspecialchars($roleDescription); ?>">
            <input type="hidden" name="requirements" value="<?php echo htmlspecialchars($requirements); ?>">
            <input type="hidden" name="location" value="<?php echo htmlspecialchars($location); ?>">
            <input type="hidden" name="salary_range" value="<?php echo htmlspecialchars($salaryRange); ?>">

            <div class="form-group">
                <label for="nama">Name:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="umur">Age:</label>
                <input type="number" id="umur" name="umur" min="1" max="120" required>
            </div>
            <div class="form-group">
                <label for="KTPnumber">KTP Number:</label>
                <input type="text" id="KTPnumber" name="KTPnumber" required>
            </div>
            <div class="form-group">
                <label for="SIMnumber">SIM Number:</label>
                <input type="text" id="SIMnumber" name="SIMnumber" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>
