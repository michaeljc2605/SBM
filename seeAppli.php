<?php
session_start();

// Security check: Validate referrer
$allowed_referrers = [
    'http://localhost/SBM/staffmainpage.php',
    'http://localhost/SBM/manageJobs.php',
    'http://localhost/SBM/seeAppli.php' // Allow self-referral for delete/edit actions
];

$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

// Check if referrer is valid
$valid_referrer = false;
foreach ($allowed_referrers as $allowed) {
    if (strpos($referrer, $allowed) === 0) {
        $valid_referrer = true;
        break;
    }
}

// If referrer is not valid and it's not a direct page load after session validation
if (!$valid_referrer && !isset($_SESSION['see_appli_access'])) {
    header('Location: login.php');
    exit();
}

// Set session flag to allow page refreshes and form submissions
$_SESSION['see_appli_access'] = true;

// Include the database connection
include('connect.php');

// Check for the delete action
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);

    // First, get the file names to delete them from server
    $file_query = "SELECT fileijazah, resume_file FROM applicant WHERE id = ?";
    $stmt = mysqli_prepare($con, $file_query);
    mysqli_stmt_bind_param($stmt, "i", $delete_id);
    mysqli_stmt_execute($stmt);
    $file_result = mysqli_stmt_get_result($stmt);
    
    if ($file_data = mysqli_fetch_assoc($file_result)) {
        // Delete physical files if they exist
        if (!empty($file_data['fileijazah']) && file_exists('tumbal/' . $file_data['fileijazah'])) {
            unlink('tumbal/' . $file_data['fileijazah']);
        }
        if (!empty($file_data['resume_file']) && file_exists('tumbal/' . $file_data['resume_file'])) {
            unlink('tumbal/' . $file_data['resume_file']);
        }
    }

    // Now delete the applicant from the database using prepared statement
    $delete_query = "DELETE FROM applicant WHERE id = ?";
    $delete_stmt = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_stmt, "i", $delete_id);
    $delete_result = mysqli_stmt_execute($delete_stmt);

    if ($delete_result) {
        echo "<script>alert('Applicant and associated files deleted successfully'); window.location='seeAppli.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error deleting applicant: " . mysqli_error($con) . "'); window.location='seeAppli.php';</script>";
        exit();
    }
}

// Query to fetch all applicants
$query = "SELECT id, job_id, nama, umur, fileijazah, KTPnumber, SIMnumber, email, phone_number, address, applied_date, resume_file FROM applicant ORDER BY applied_date DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Error: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants List - SBM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f0ed 0%, #e8ddd8 100%);
            min-height: 100vh;
            padding-top: 80px;
        }

        .page-header {
            background: linear-gradient(135deg, #B8A099 0%, #9d857c 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .page-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
        }

        .table-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(184, 160, 153, 0.15);
            margin-bottom: 40px;
        }

        .stats-row {
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(184, 160, 153, 0.3);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-card p {
            margin: 0;
            opacity: 0.9;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        table thead {
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            color: white;
        }

        table thead th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border: none;
            white-space: nowrap;
            font-size: 0.9rem;
        }

        table thead th:first-child {
            border-radius: 10px 0 0 0;
        }

        table thead th:last-child {
            border-radius: 0 10px 0 0;
        }

        table tbody tr {
            background: white;
            transition: all 0.3s ease;
        }

        table tbody tr:nth-child(even) {
            background-color: #faf8f7;
        }

        table tbody tr:hover {
            background-color: #f0ebe8;
            transform: scale(1.01);
            box-shadow: 0 3px 10px rgba(184, 160, 153, 0.2);
        }

        table tbody td {
            padding: 15px;
            border-bottom: 1px solid #e9e9e9;
            font-size: 0.9rem;
            color: #5a5a5a;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        table tbody tr:last-child td:first-child {
            border-radius: 0 0 0 10px;
        }

        table tbody tr:last-child td:last-child {
            border-radius: 0 0 10px 0;
        }

        .action-btn {
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            margin: 2px;
            white-space: nowrap;
        }

        .btn-edit {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #20c997 0%, #28a745 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }

        .btn-delete {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #c82333 0%, #dc3545 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
        }

        .btn-view {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.8rem;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-view:hover {
            background: linear-gradient(135deg, #0056b3 0%, #007bff 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }

        .back-button {
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            color: white;
            padding: 12px 30px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            display: inline-block;
            font-weight: 600;
        }

        .back-button:hover {
            background: linear-gradient(135deg, #a68d84 0%, #947a70 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(184, 160, 153, 0.4);
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-size: 1.1rem;
        }

        .badge-id {
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .search-filter {
            margin-bottom: 20px;
        }

        .search-filter input {
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }

        .search-filter input:focus {
            border-color: #B8A099;
            outline: none;
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .table-container {
                padding: 20px;
            }

            table thead th,
            table tbody td {
                padding: 10px;
                font-size: 0.85rem;
            }

            .stat-card h3 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php include("navbarmain.php"); ?>
    
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1><i class="fas fa-users me-3"></i>Job Applicants</h1>
            <p>Manage and review all job applications</p>
        </div>
    </div>

    <div class="container">
        <!-- Statistics Row -->
        <div class="row stats-row">
            <div class="col-md-4">
                <div class="stat-card">
                    <h3><?php echo mysqli_num_rows($result); ?></h3>
                    <p>Total Applicants</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <h3><?php 
                        mysqli_data_seek($result, 0);
                        $today = date('Y-m-d');
                        $today_count = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            if(date('Y-m-d', strtotime($row['applied_date'])) == $today) {
                                $today_count++;
                            }
                        }
                        echo $today_count;
                        mysqli_data_seek($result, 0);
                    ?></h3>
                    <p>New Today</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <h3><?php 
                        mysqli_data_seek($result, 0);
                        $week_ago = date('Y-m-d', strtotime('-7 days'));
                        $week_count = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            if(date('Y-m-d', strtotime($row['applied_date'])) >= $week_ago) {
                                $week_count++;
                            }
                        }
                        echo $week_count;
                        mysqli_data_seek($result, 0);
                    ?></h3>
                    <p>This Week</p>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <div class="search-filter">
                <input type="text" id="searchInput" placeholder="🔍 Search by name, email, or phone..." onkeyup="searchTable()">
            </div>

            <div class="table-wrapper">
                <table id="applicantsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>KTP Number</th>
                            <th>SIM Number</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Applied Date</th>
                            <th>Ijazah</th>
                            <th>Resume</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            mysqli_data_seek($result, 0);
                            while ($applicant = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td><span class='badge-id'>#" . $applicant['id'] . "</span></td>";
                                echo "<td>" . $applicant['job_id'] . "</td>";
                                echo "<td><strong>" . htmlspecialchars($applicant['nama']) . "</strong></td>";
                                echo "<td>" . $applicant['umur'] . "</td>";
                                echo "<td>" . htmlspecialchars($applicant['KTPnumber']) . "</td>";
                                echo "<td>" . ($applicant['SIMnumber'] ? htmlspecialchars($applicant['SIMnumber']) : '<span style="color: #999;">N/A</span>') . "</td>";
                                echo "<td>" . htmlspecialchars($applicant['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($applicant['phone_number']) . "</td>";
                                echo "<td>" . ($applicant['address'] ? htmlspecialchars($applicant['address']) : '<span style="color: #999;">N/A</span>') . "</td>";
                                echo "<td>" . date('d M Y', strtotime($applicant['applied_date'])) . "</td>";
                                echo "<td>";
                                if ($applicant['fileijazah']) {
                                    echo "<a href='/SBM/tumbal/" . htmlspecialchars($applicant['fileijazah']) . "' target='_blank' class='btn-view'><i class='fas fa-file-pdf'></i> View</a>";
                                } else {
                                    echo "<span style='color: #999;'>No File</span>";
                                }
                                echo "</td>";
                                echo "<td>";
                                if ($applicant['resume_file']) {
                                    echo "<a href='/SBM/tumbal/" . htmlspecialchars($applicant['resume_file']) . "' target='_blank' class='btn-view'><i class='fas fa-file-pdf'></i> View</a>";
                                } else {
                                    echo "<span style='color: #999;'>No File</span>";
                                }
                                echo "</td>";
                                echo "<td style='white-space: nowrap;'>";
                                echo "<a href='edit_applicant.php?id=" . $applicant['id'] . "' class='action-btn btn-edit'><i class='fas fa-edit'></i> Edit</a> ";
                                echo "<a href='seeAppli.php?delete_id=" . $applicant['id'] . "' class='action-btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this applicant? This will also delete their uploaded files.\")'><i class='fas fa-trash'></i> Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='13' class='no-data'><i class='fas fa-inbox' style='font-size: 3rem; color: #ccc; display: block; margin-bottom: 15px;'></i>No applicants found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 30px; text-align: center;">
                <a href="staffmainpage.php" class="back-button"><i class="fas fa-arrow-left me-2"></i>Back to Homepage</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toUpperCase();
            const table = document.getElementById('applicantsTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td');
                let found = false;
                
                // Search in name (index 2), email (index 6), phone (index 7)
                const searchFields = [2, 6, 7];
                for (let field of searchFields) {
                    if (td[field]) {
                        const txtValue = td[field].textContent || td[field].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                
                tr[i].style.display = found ? '' : 'none';
            }
        }

        // Smooth scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    row.style.transition = 'all 0.4s ease';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, index * 50);
            });
        });
    </script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>