<?php
session_start();

// Include the database connection file
include('connect.php');

// Include PHPMailer
require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Initialize variables for messages
$successMessage = "";
$errorMessage = "";

// Directory to upload files
$uploadDirectory = "/Applications/XAMPP/xamppfiles/htdocs/SBM/tumbal/";

// Gmail SMTP Configuration
$gmailConfig = array(
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_username' => 'jace260505@gmail.com', // Your Gmail address
    'smtp_password' => 'nzpc pmhb iine pcis', // Your Gmail App Password (NOT regular password)
    'from_email' => 'jace260505@gmail.com',
    'from_name' => 'Job Application System',
    'notification_email' => 'jackyantonious@gmail.com' // Where to send notifications
);

// Check if the job details are set in the URL
if (isset($_GET['job_id']) && isset($_GET['role_name']) && isset($_GET['role_description']) && isset($_GET['requirements']) && isset($_GET['location']) && isset($_GET['salary_range'])) {
    $jobId = intval($_GET['job_id']); // Sanitize job_id
    $roleName = $_GET['role_name'];
    $roleDescription = $_GET['role_description'];
    $requirements = $_GET['requirements'];
    $location = $_GET['location'];
    $salaryRange = $_GET['salary_range'];
} else {
    $errorMessage = "No job details available.";
    exit($errorMessage); // Exit to prevent further processing
}

// Function to send email notification using PHPMailer
function sendGmailNotification($applicantData, $jobData, $gmailConfig) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $gmailConfig['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $gmailConfig['smtp_username'];
        $mail->Password = $gmailConfig['smtp_password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $gmailConfig['smtp_port'];
        
        // Recipients
        $mail->setFrom($gmailConfig['from_email'], $gmailConfig['from_name']);
        $mail->addAddress($gmailConfig['notification_email']);
        $mail->addReplyTo($applicantData['email'], $applicantData['nama']);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Job Application Received - ' . $jobData['role_name'];
        
        $mail->Body = "
        <html>
        <head>
            <title>New Job Application</title>
            <style>
                body { 
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
                    margin: 0; 
                    padding: 0; 
                    background-color: #f5f5f5; 
                }
                .container { 
                    max-width: 600px; 
                    margin: 20px auto; 
                    background-color: white; 
                    border-radius: 10px; 
                    overflow: hidden;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                }
                .header { 
                    background: linear-gradient(135deg, #007bff, #0056b3); 
                    color: white; 
                    padding: 30px 20px; 
                    text-align: center; 
                }
                .header h1 { 
                    margin: 0; 
                    font-size: 24px; 
                    font-weight: 300; 
                }
                .content { 
                    padding: 30px 20px; 
                }
                .info-section { 
                    background-color: #f8f9fa; 
                    padding: 20px; 
                    margin: 15px 0; 
                    border-radius: 8px; 
                    border-left: 4px solid #007bff;
                }
                .info-section h3 { 
                    margin: 0 0 15px 0; 
                    color: #333; 
                    font-size: 18px;
                }
                .info-row { 
                    display: flex; 
                    margin: 8px 0; 
                    padding: 5px 0;
                    border-bottom: 1px solid #e9ecef;
                }
                .info-row:last-child {
                    border-bottom: none;
                }
                .info-label { 
                    font-weight: bold; 
                    color: #495057; 
                    min-width: 120px;
                    flex-shrink: 0;
                }
                .info-value { 
                    color: #212529; 
                    flex-grow: 1;
                }
                .footer { 
                    background-color: #6c757d; 
                    color: white; 
                    padding: 20px; 
                    text-align: center; 
                    font-size: 14px;
                }
                .urgent { 
                    background-color: #fff3cd; 
                    border: 1px solid #ffeaa7; 
                    color: #856404; 
                    padding: 15px; 
                    border-radius: 5px; 
                    margin: 15px 0;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>🎯 New Job Application Received!</h1>
                    <p style='margin: 10px 0 0 0; opacity: 0.9;'>A candidate has applied for your open position</p>
                </div>
                
                <div class='content'>
                    <div class='urgent'>
                        <strong>⚡ Action Required:</strong> A new application has been submitted and requires your review.
                    </div>
                    
                    <div class='info-section'>
                        <h3>📋 Job Details</h3>
                        <div class='info-row'>
                            <div class='info-label'>Position:</div>
                            <div class='info-value'>{$jobData['role_name']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Location:</div>
                            <div class='info-value'>{$jobData['location']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Salary Range:</div>
                            <div class='info-value'>{$jobData['salary_range']}</div>
                        </div>
                    </div>
                    
                    <div class='info-section'>
                        <h3>👤 Applicant Information</h3>
                        <div class='info-row'>
                            <div class='info-label'>Name:</div>
                            <div class='info-value'>{$applicantData['nama']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Age:</div>
                            <div class='info-value'>{$applicantData['umur']} years old</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Email:</div>
                            <div class='info-value'><a href='mailto:{$applicantData['email']}'>{$applicantData['email']}</a></div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Phone:</div>
                            <div class='info-value'><a href='tel:{$applicantData['phone_number']}'>{$applicantData['phone_number']}</a></div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>KTP Number:</div>
                            <div class='info-value'>{$applicantData['KTPnumber']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>SIM Number:</div>
                            <div class='info-value'>{$applicantData['SIMnumber']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Address:</div>
                            <div class='info-value'>{$applicantData['address']}</div>
                        </div>
                    </div>
                    
                    <div class='info-section'>
                        <h3>📄 Uploaded Documents</h3>
                        <div class='info-row'>
                            <div class='info-label'>Ijazah:</div>
                            <div class='info-value'>{$applicantData['fileijazah']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Resume:</div>
                            <div class='info-value'>{$applicantData['resume_file']}</div>
                        </div>
                    </div>
                    
                    <div class='urgent'>
                        <strong>📁 Next Steps:</strong> Please check your admin panel to review the complete application and download the submitted files for detailed evaluation.
                    </div>
                </div>
                
                <div class='footer'>
                    <p>📧 This is an automated notification from your Job Application System</p>
                    <p>⏰ Received: " . date('Y-m-d H:i:s') . "</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        // Alternative plain text body for email clients that don't support HTML
        $mail->AltBody = "
New Job Application Received!

Job Position: {$jobData['role_name']}
Location: {$jobData['location']}
Salary: {$jobData['salary_range']}

Applicant Details:
Name: {$applicantData['nama']}
Age: {$applicantData['umur']}
Email: {$applicantData['email']}
Phone: {$applicantData['phone_number']}
KTP: {$applicantData['KTPnumber']}
SIM: {$applicantData['SIMnumber']}
Address: {$applicantData['address']}

Files Uploaded:
- Ijazah: {$applicantData['fileijazah']}
- Resume: {$applicantData['resume_file']}

Please check your admin panel to review the complete application.
        ";
        
        $mail->send();
        return true;
        
    } catch (Exception $e) {
        error_log("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

// Function to send confirmation email to applicant
function sendApplicantConfirmation($applicantData, $jobData, $gmailConfig) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $gmailConfig['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $gmailConfig['smtp_username'];
        $mail->Password = $gmailConfig['smtp_password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $gmailConfig['smtp_port'];
        
        // Recipients
        $mail->setFrom($gmailConfig['from_email'], $gmailConfig['from_name']);
        $mail->addAddress($applicantData['email'], $applicantData['nama']);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Application Received - ' . $jobData['role_name'];
        
        $mail->Body = "
        <html>
        <head>
            <style>
                body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5; }
                .container { max-width: 600px; margin: 20px auto; background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
                .header { background: linear-gradient(135deg, #28a745, #20c997); color: white; padding: 30px 20px; text-align: center; }
                .content { padding: 30px 20px; }
                .success-box { background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 20px; border-radius: 8px; margin: 20px 0; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>✅ Application Received!</h1>
                </div>
                <div class='content'>
                    <p>Dear {$applicantData['nama']},</p>
                    <div class='success-box'>
                        <strong>Thank you for applying!</strong> We have successfully received your application for the position of <strong>{$jobData['role_name']}</strong>.
                    </div>
                    <p><strong>Application Details:</strong></p>
                    <ul>
                        <li>Position: {$jobData['role_name']}</li>
                        <li>Location: {$jobData['location']}</li>
                        <li>Submitted: " . date('Y-m-d H:i:s') . "</li>
                    </ul>
                    <p>We will review your application and contact you if your qualifications match our requirements.</p>
                    <p>Best regards,<br>The Hiring Team</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $mail->send();
        return true;
        
    } catch (Exception $e) {
        return false;
    }
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve applicant data from the form
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $umur = intval($_POST['umur']);
    $KTPnumber = mysqli_real_escape_string($con, $_POST['KTPnumber']);
    $SIMnumber = !empty($_POST['SIMnumber']) ? mysqli_real_escape_string($con, $_POST['SIMnumber']) : NULL;
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $address = !empty($_POST['address']) ? mysqli_real_escape_string($con, $_POST['address']) : NULL;

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
                    
                    // Insert applicant details into the database
                    $query = "INSERT INTO applicant (job_id, nama, umur, KTPnumber, SIMnumber, email, phone_number, address, fileijazah, resume_file)
                              VALUES ('$jobId', '$nama', $umur, '$KTPnumber', '$SIMnumber', '$email', '$phone_number', '$address', '$ijazahFileName', '$resumeFileName')";
                    
                    if (mysqli_query($con, $query)) {
                        // Prepare data for email notifications
                        $applicantData = array(
                            'nama' => $nama,
                            'umur' => $umur,
                            'email' => $email,
                            'phone_number' => $phone_number,
                            'KTPnumber' => $KTPnumber,
                            'SIMnumber' => $SIMnumber,
                            'address' => $address,
                            'fileijazah' => $ijazahFileName,
                            'resume_file' => $resumeFileName
                        );
                        
                        $jobData = array(
                            'role_name' => $roleName,
                            'location' => $location,
                            'salary_range' => $salaryRange
                        );
                        
                        // Send notification email to admin
                        $adminEmailSent = sendGmailNotification($applicantData, $jobData, $gmailConfig);
                        
                        // Send confirmation email to applicant
                        $applicantEmailSent = sendApplicantConfirmation($applicantData, $jobData, $gmailConfig);
                        
                        // Success message based on email results
                        if ($adminEmailSent && $applicantEmailSent) {
                            $successMessage = "Application submitted successfully! Email notifications sent to both admin and applicant.";
                        } else if ($adminEmailSent) {
                            $successMessage = "Application submitted successfully! Admin notification sent. (Applicant confirmation failed)";
                        } else if ($applicantEmailSent) {
                            $successMessage = "Application submitted successfully! Applicant confirmation sent. (Admin notification failed)";
                        } else {
                            $successMessage = "Application submitted successfully! (Note: Email notifications failed - please check email configuration)";
                        }
                    } else {
                        $errorMessage = "Database Error: " . mysqli_error($con);
                    }
                } else {
                    $errorMessage = "Failed to move the uploaded files.";
                }
            } else {
                $errorMessage = "Only PDF files are allowed for ijazah and resume.";
            }
        } else {
            $errorMessage = "Error uploading files. Please try again.";
        }
    } else {
        $errorMessage = "Both ijazah and resume files are required.";
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
    <title>Apply for Job: <?php echo htmlspecialchars($roleName); ?></title>
    <style>
        /* Enhanced styling for the form and messages */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #A3B5CC, #FFFFFF);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            max-width: 450px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #28a745);
        }
        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            font-weight: 300;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
            font-size: 14px;
        }
        .form-group input, .form-group textarea {
            width: calc(100% - 20px);
            padding: 12px 10px;
            border: 2px solid #e9ecef;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }
        .form-group textarea {
            resize: vertical;
            min-height: 90px;
        }
        .form-group input[type="file"] {
            padding: 8px;
            border: 2px dashed #dee2e6;
            background-color: #f8f9fa;
        }
        .form-group input[type="file"]:hover {
            border-color: #007bff;
            background-color: #e3f2fd;
        }
        .form-group button {
            width: 100%;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border: none;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .form-group button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }
        .form-group button:active {
            transform: translateY(0);
        }
        .success, .error {
            text-align: center;
            margin: 15px 0;
            padding: 15px;
            border-radius: 8px;
            font-weight: 500;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .notification-info {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: #0d47a1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            text-align: center;
            border-left: 4px solid #2196f3;
        }
        .notification-info .icon {
            font-size: 18px;
            margin-right: 8px;
        }
        .required {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Apply for Job: <?php echo htmlspecialchars($roleName); ?></h1>
        
        <div class="notification-info">
            <span class="icon">📧</span>
            You will receive email confirmations after submitting your application
        </div>
        
        <?php if ($successMessage): ?>
            <div class="success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <?php if ($errorMessage): ?>
            <div class="error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?php echo htmlspecialchars($jobId); ?>">
            <input type="hidden" name="role_name" value="<?php echo htmlspecialchars($roleName); ?>">
            <input type="hidden" name="role_description" value="<?php echo htmlspecialchars($roleDescription); ?>">
            <input type="hidden" name="requirements" value="<?php echo htmlspecialchars($requirements); ?>">
            <input type="hidden" name="location" value="<?php echo htmlspecialchars($location); ?>">
            <input type="hidden" name="salary_range" value="<?php echo htmlspecialchars($salaryRange); ?>">

            <div class="form-group">
                <label for="nama">Full Name <span class="required">*</span></label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="umur">Age <span class="required">*</span></label>
                <input type="number" id="umur" name="umur" min="1" max="120" required>
            </div>
            <div class="form-group">
                <label for="KTPnumber">KTP Number <span class="required">*</span></label>
                <input type="text" id="KTPnumber" name="KTPnumber" required>
            </div>
            <div class="form-group">
                <label for="SIMnumber">SIM Number</label>
                <input type="text" id="SIMnumber" name="SIMnumber">
            </div>
            <div class="form-group">
                <label for="email">Email Address <span class="required">*</span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number <span class="required">*</span></label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address">Address <span class="required">*</span></label>
                <textarea id="address" name="address" required placeholder="Enter your complete address"></textarea>
            </div>
            <div class="form-group">
                <label for="ijazah">Ijazah (PDF) <span class="required">*</span></label>
                <input type="file" id="ijazah" name="ijazah" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="resume">Resume (PDF) <span class="required">*</span></label>
                <input type="file" id="resume" name="resume" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit Application</button>
            </div>
        </form>
    </div>
</body>
</html>