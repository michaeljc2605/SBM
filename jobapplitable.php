<?php
// Include the database connection
include('connect.php');

// Fetch job data
$query = "SELECT * FROM job";
$result = mysqli_query($con, $query);

// Check if there are any jobs
if (mysqli_num_rows($result) > 0) {
    echo '<table style="border-collapse: collapse; width: 100%; text-align: left;">';
    echo '<thead>';
    echo '<tr style="background-color: #f2f2f2;">';
    echo '<th style="padding: 10px; border: 1px solid #ddd;">Role Name</th>';
    echo '<th style="padding: 10px; border: 1px solid #ddd;">Description</th>';
    echo '<th style="padding: 10px; border: 1px solid #ddd;">Requirements</th>';
    echo '<th style="padding: 10px; border: 1px solid #ddd;">Location</th>';
    echo '<th style="padding: 10px; border: 1px solid #ddd;">Salary Range</th>';
    echo '<th style="padding: 10px; border: 1px solid #ddd;">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Loop through the jobs and display each as a table row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td style="padding: 10px; border: 1px solid #ddd;">' . htmlspecialchars($row['role_name']) . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd;">' . htmlspecialchars($row['role_description']) . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd;">' . htmlspecialchars($row['requirements']) . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd;">' . htmlspecialchars($row['location']) . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd;">' . htmlspecialchars($row['salary_range']) . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd;">';
        echo '<button style="background-color: #4CAF50; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Interested</button>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No job listings available.</p>';
}

// Close the connection
mysqli_close($con);
?>
