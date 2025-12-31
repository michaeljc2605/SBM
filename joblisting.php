<?php
// Include the database connection
include('connect.php');

// Fetch job data with error handling
$query = "SELECT * FROM job ORDER BY id DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    error_log("Database query failed: " . mysqli_error($con));
    $result = false; // Set to false so we can handle it gracefully
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Opportunities - Sumber Berlian Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            font-family: 'Arial', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: white;
            padding: 80px 0 60px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,0 1000,100 1000,0"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .job-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .job-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .job-card-header {
            background: linear-gradient(135deg, #A3B5CC 0%, #8fa4ba 100%);
            color: white;
            padding: 25px;
            border: none;
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        .job-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .job-card-body {
            padding: 25px;
        }

        .job-description {
            color: #6c757d;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .requirements-list {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .requirements-list h6 {
            color: #495057;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .apply-btn {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        .apply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
            background: linear-gradient(135deg, #0056b3 0%, #003d7a 100%);
            color: white;
        }

        .salary-badge {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }

        .no-jobs {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .no-jobs i {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .stats-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
            text-align: center;
        }

        .stat-item {
            display: inline-block;
            margin: 0 20px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0 40px;
            }
            
            .job-meta {
                flex-direction: column;
                gap: 10px;
            }
            
            .job-card-header,
            .job-card-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    <?php include("navbar.php"); ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">
                        <i class="fas fa-briefcase me-3"></i>
                        Peluang Karir
                    </h1>
                    <p class="lead mb-4">
                        Bergabunglah dengan tim dinamis kami dan bangun masa depan Anda bersama Sumber Berlian Mandiri. 
                        Kami menawarkan peluang menarik untuk pertumbuhan dan pengembangan karir.
                    </p>
                    
                    <?php
                    // Get job count for stats with error handling
                    $countQuery = "SELECT COUNT(*) as total_jobs FROM job";
                    $countResult = mysqli_query($con, $countQuery);
                    $jobCount = 0;
                    
                    if ($countResult) {
                        $jobCount = mysqli_fetch_assoc($countResult)['total_jobs'];
                    } else {
                        error_log("Job count query failed: " . mysqli_error($con));
                    }
                    ?>
                    
                    <div class="stats-section">
                        <div class="stat-item">
                            <span class="stat-number"><?php echo $jobCount; ?></span>
                            <span class="stat-label">Posisi Terbuka</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">5+</span>
                            <span class="stat-label">Departemen</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">100+</span>
                            <span class="stat-label">Anggota Tim</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Filter Section -->
        <div class="filter-section">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0">
                        <i class="fas fa-filter me-2"></i>
                        Posisi yang Tersedia
                    </h5>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="input-group" style="max-width: 300px; margin-left: auto;">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Cari posisi..." id="jobSearch">
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Listings -->
        <div class="row" id="jobContainer">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                // Loop through the jobs and display each as a card
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-6 col-xl-4 job-item" data-job="' . strtolower(htmlspecialchars($row['role_name'])) . '">';
                    echo '<div class="job-card h-100">';
                    
                    // Card Header
                    echo '<div class="job-card-header">';
                    echo '<h3 class="job-title">' . htmlspecialchars($row['role_name']) . '</h3>';
                    echo '<div class="job-meta">';
                    echo '<div class="job-meta-item">';
                    echo '<i class="fas fa-map-marker-alt"></i>';
                    echo '<span>' . htmlspecialchars($row['location']) . '</span>';
                    echo '</div>';
                    echo '<div class="job-meta-item">';
                    echo '<i class="fas fa-clock"></i>';
                    echo '<span>Full Time</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    
                    // Card Body
                    echo '<div class="job-card-body d-flex flex-column">';
                    
                    // Salary Badge
                    echo '<div class="salary-badge">';
                    echo '<i class="fas fa-money-bill-wave me-2"></i>';
                    echo 'Rp ' . htmlspecialchars($row['salary_range']);
                    echo '</div>';
                    
                    // Description
                    echo '<div class="job-description flex-grow-1">';
                    echo '<p>' . htmlspecialchars($row['role_description']) . '</p>';
                    echo '</div>';
                    
                    // Requirements
                    echo '<div class="requirements-list">';
                    echo '<h6><i class="fas fa-list-check"></i> Kualifikasi Utama</h6>';
                    echo '<p class="mb-0 small">' . htmlspecialchars($row['requirements']) . '</p>';
                    echo '</div>';
                    
                    // Apply Button
                    echo '<div class="text-center">';
                    echo '<button class="btn apply-btn" onclick="redirectToApplication(' . 
                         htmlspecialchars($row['id']) . ', \'' . 
                         htmlspecialchars(addslashes($row['role_name'])) . '\', \'' . 
                         htmlspecialchars(addslashes($row['role_description'])) . '\', \'' . 
                         htmlspecialchars(addslashes($row['requirements'])) . '\', \'' . 
                         htmlspecialchars(addslashes($row['location'])) . '\', \'' . 
                         htmlspecialchars(addslashes($row['salary_range'])) . '\')">';
                    echo '<i class="fas fa-paper-plane me-2"></i>Lamar Sekarang';
                    echo '</button>';
                    echo '</div>';
                    
                    echo '</div>'; // End card body
                    echo '</div>'; // End job card
                    echo '</div>'; // End column
                }
            } else {
                echo '<div class="col-12">';
                echo '<div class="no-jobs">';
                echo '<i class="fas fa-briefcase"></i>';
                echo '<h3>Tidak Ada Lowongan Pekerjaan</h3>';
                echo '<p class="text-muted">Saat ini kami tidak memiliki posisi terbuka, tetapi kami selalu mencari individu berbakat. Silakan periksa kembali nanti atau kirimkan resume Anda untuk peluang di masa mendatang.</p>';
                echo '<a href="mailto:hr@sumberberlianmandiri.com" class="btn btn-outline-primary">';
                echo '<i class="fas fa-envelope me-2"></i>Hubungi HR';
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <?php include("Footer.php"); ?>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to redirect to job application
        function redirectToApplication(jobId, roleName, roleDescription, requirements, location, salaryRange) {
            const url = `jobapplifin.php?job_id=${jobId}&role_name=${encodeURIComponent(roleName)}&role_description=${encodeURIComponent(roleDescription)}&requirements=${encodeURIComponent(requirements)}&location=${encodeURIComponent(location)}&salary_range=${encodeURIComponent(salaryRange)}`;
            window.location.href = url;
        }

        // Search functionality
        document.getElementById('jobSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const jobItems = document.querySelectorAll('.job-item');
            
            jobItems.forEach(function(item) {
                const jobTitle = item.getAttribute('data-job');
                if (jobTitle.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Add smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe job cards
        document.addEventListener('DOMContentLoaded', function() {
            const jobCards = document.querySelectorAll('.job-card');
            jobCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        });
    </script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>