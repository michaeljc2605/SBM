<?php
// PHP Component - Content Section with Navigation and Dynamic Areas
?>

<!-- Content Section with Navigation and Dynamic Areas -->
<style>
    /* Navigation Styles */
    .content-nav {
        background: linear-gradient(135deg, #91756D, #A68B7A);
        padding: clamp(12px, 2vh, 15px) 0;
        border-radius: clamp(12px, 2vw, 15px);
        margin: clamp(20px, 4vh, 30px) 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .content-nav .container-fluid {
        padding: 0 clamp(15px, 3vw, 20px);
    }

    .content-nav .navbar-nav {
        width: 100%;
        display: flex;
        justify-content: center;
        gap: clamp(8px, 2vw, 20px);
        flex-wrap: wrap;
    }

    .content-nav .nav-link {
        color: white !important;
        font-weight: 500;
        padding: clamp(10px, 2vh, 12px) clamp(20px, 4vw, 25px) !important;
        border-radius: 25px;
        transition: all 0.3s ease;
        text-decoration: none;
        cursor: pointer;
        background: none;
        border: 2px solid transparent;
        font-size: clamp(0.9rem, 2vw, 1rem);
        white-space: nowrap;
        min-height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .content-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    .content-nav .nav-link.active {
        background-color: rgba(255, 255, 255, 0.3);
        font-weight: bold;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
    }

    /* Content Area Styles */
    .content-section {
        background: white;
        border-radius: clamp(15px, 3vw, 20px);
        padding: clamp(25px, 5vw, 40px);
        margin: clamp(15px, 3vh, 20px) 0;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
        min-height: auto;
        height: auto;
        overflow: visible;
    }

    .section-title {
        color: #91756D;
        font-weight: 700;
        margin-bottom: clamp(20px, 4vh, 30px);
        position: relative;
        font-size: clamp(1.5rem, 5vw, 2.2rem);
        line-height: 1.2;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: clamp(60px, 15vw, 80px);
        height: 3px;
        background: linear-gradient(90deg, #91756D, #A68B7A);
        border-radius: 2px;
    }

    /* Image Wrapper Styles */
    .image-wrapper {
        border-radius: clamp(12px, 2vw, 15px);
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        height: auto;
    }

    .image-container {
        width: 100%;
        position: relative;
        padding-top: 66.67%; /* 3:2 aspect ratio */
        overflow: hidden;
        border-radius: clamp(12px, 2vw, 15px);
    }

    .content-section img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        border-radius: clamp(12px, 2vw, 15px);
    }

    /* Button Styles */
    .btn-warning {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: white;
        font-weight: bold;
        padding: clamp(12px, 2vh, 15px) clamp(30px, 6vw, 40px);
        font-size: clamp(1rem, 2.5vw, 1.2rem);
        border-radius: 50px;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(243, 156, 18, 0.3);
        text-decoration: none;
        display: inline-block;
        min-height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #e67e22, #d35400);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(243, 156, 18, 0.4);
        color: white;
    }

    .btn-read-more {
        background: linear-gradient(135deg, #91756D, #A68B7A);
        color: white;
        font-weight: 500;
        padding: clamp(10px, 2vh, 12px) clamp(25px, 5vw, 30px);
        font-size: clamp(0.9rem, 2vw, 1rem);
        border-radius: 25px;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(145, 117, 109, 0.3);
        text-decoration: none;
        display: inline-block;
        margin-top: clamp(15px, 3vh, 20px);
        min-height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-read-more:hover {
        background: linear-gradient(135deg, #A68B7A, #B89A8C);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(145, 117, 109, 0.4);
        color: white;
    }

    /* Text Styling */
    .content-section p {
        font-size: clamp(0.95rem, 2.5vw, 1.1rem);
        line-height: 1.8;
        color: #495057;
        text-align: justify;
        margin-bottom: clamp(15px, 3vh, 20px);
    }

    .content-section h4 {
        color: #91756D;
        font-weight: 600;
        margin-bottom: clamp(12px, 2vh, 15px);
        font-size: clamp(1.1rem, 3vw, 1.3rem);
    }

    /* Row spacing adjustments */
    .content-section .row {
        row-gap: clamp(20px, 4vh, 30px);
    }

    /* Animation for content switching */
    .content-section {
        animation: fadeIn 0.5s ease-in-out;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Tablet Landscape (1024px - 1199px) */
    @media (min-width: 1024px) and (max-width: 1199px) {
        .content-section {
            padding: 35px;
        }
    }

    /* Tablet Portrait (768px - 1023px) */
    @media (min-width: 768px) and (max-width: 1023px) {
        .content-nav .navbar-nav {
            gap: 15px;
        }

        .content-section {
            padding: 30px;
        }

        .image-container {
            padding-top: 70%;
        }
    }

    /* Mobile Landscape (576px - 767px) */
    @media (min-width: 576px) and (max-width: 767px) {
        .content-nav .navbar-nav {
            gap: 10px;
        }

        .content-section {
            padding: 25px 20px;
        }

        .content-section p {
            text-align: left;
        }

        .image-container {
            padding-top: 60%;
        }
    }

    /* Mobile Portrait (up to 575px) */
    @media (max-width: 575px) {
        .content-nav {
            padding: 10px 0;
            margin: 15px 0;
        }

        .content-nav .navbar-nav {
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
            padding: 0 15px;
        }

        .content-nav .nav-link {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            justify-content: center;
        }

        .content-section {
            padding: 20px 15px;
            margin: 15px 0;
        }

        .section-title {
            margin-bottom: 20px;
        }

        .content-section p {
            text-align: left;
            line-height: 1.6;
        }

        .image-wrapper {
            margin-top: 20px;
        }

        .image-container {
            padding-top: 65%;
        }

        .btn-read-more,
        .btn-warning {
            width: 100%;
            max-width: 280px;
            text-align: center;
        }
    }

    /* Extra Small Mobile (up to 375px) */
    @media (max-width: 375px) {
        .content-nav {
            margin: 12px 0;
        }

        .content-section {
            padding: 18px 12px;
        }

        .section-title::after {
            width: 50px;
        }

        .image-container {
            padding-top: 70%;
        }
    }

    /* Touch device improvements */
    @media (hover: none) and (pointer: coarse) {
        .content-nav .nav-link:hover {
            transform: none;
        }

        .content-nav .nav-link:active {
            transform: scale(0.98);
            background-color: rgba(255, 255, 255, 0.25);
        }

        .btn-read-more:active,
        .btn-warning:active {
            transform: scale(0.98);
        }
    }

    /* Landscape orientation on mobile */
    @media (orientation: landscape) and (max-height: 500px) {
        .content-section {
            padding: 20px;
        }

        .section-title {
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .image-container {
            padding-top: 50%;
        }

        .content-section .row {
            row-gap: 15px;
        }
    }

    /* Improved readability on large screens */
    @media (min-width: 1400px) {
        .content-section p {
            max-width: 90%;
        }
    }

    /* Print styles */
    @media print {
        .content-nav {
            display: none;
        }

        .content-section {
            box-shadow: none;
            border: 1px solid #ddd;
            break-inside: avoid;
        }

        .btn-read-more,
        .btn-warning {
            display: none;
        }
    }

    /* High contrast mode support */
    @media (prefers-contrast: high) {
        .content-nav .nav-link {
            border: 2px solid white;
        }

        .content-nav .nav-link.active {
            border-width: 3px;
        }
    }

    /* Reduced motion for accessibility */
    @media (prefers-reduced-motion: reduce) {
        .content-section,
        .content-nav .nav-link,
        .btn-read-more,
        .btn-warning {
            animation: none;
            transition: none;
        }
    }
</style>

<!-- Content Navigation -->
<div class="container">
    <nav class="navbar navbar-expand-lg content-nav">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button type="button" class="nav-link active" onclick="changeContent('section1', this)" aria-label="View About Us section">About Us</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" onclick="changeContent('section2', this)" aria-label="View Careers section">Careers</button>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Dynamic Content Area -->
<div class="container">
    <!-- Section 1: About Us -->
    <div class="content-section" id="section1" role="region" aria-labelledby="aboutus-title">
        <h2 class="section-title text-center" id="aboutus-title">About Us</h2>
        <div class="row align-items-start">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <p>
                    PT. Sumber Berlian Mandiri (SBM) is a newly-integrated converting carton box manufacturer, established in 2021 and mainly based in Krian, Indonesia.
                </p>
                <p>
                    Since then, we have been continuously thriving to become one of the best converting carton box companies in Indonesia.
                </p>
                <a href="aboutUs.php" class="btn-read-more">Read More</a>
            </div>
            <div class="col-lg-6">
                <div class="image-wrapper">
                    <div class="image-container">
                        <img src="static/about_us_image.jpeg" class="img-fluid" alt="About Us - Manufacturing Facility" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Careers -->
    <div class="content-section d-none" id="section2" role="region" aria-labelledby="careers-title">
        <h2 class="section-title text-center" id="careers-title">Careers</h2>
        <div class="row align-items-start">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <p style="color: #6c757d; margin-bottom: 30px; text-align: left;">
                    Looking to be part of our amazing team? We are always looking for talented individuals to join us in our mission to become Indonesia's leading packaging solutions provider.
                </p>
                <p style="color: #6c757d; margin-bottom: 30px; text-align: left;">
                    At SBM, we offer competitive benefits, professional development opportunities, and a collaborative work environment where innovation thrives.
                </p>
                
                <a href="joblisting.php" class="btn-read-more">Join Our Team Today</a>
            </div>
            <div class="col-lg-6">
                <div class="image-wrapper">
                    <div class="image-container">
                        <img src="/SBM/static/mari_bekerja.jpeg" class="img-fluid" alt="Our careers - Join our team" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (required for carousel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for Content Switching -->
<script>
    // Function to change content visibility with smooth transitions
    function changeContent(sectionId, element) {
        // Get all sections and links
        const sections = document.querySelectorAll('.content-section');
        const links = document.querySelectorAll('.content-nav .nav-link');
        const targetSection = document.getElementById(sectionId);
        
        // Check if already active
        if (element.classList.contains('active')) {
            return;
        }
        
        // Hide all sections with animation
        sections.forEach(function(section) {
            if (!section.classList.contains('d-none')) {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                setTimeout(function() {
                    section.classList.add('d-none');
                }, 300);
            }
        });

        // Show the selected section with animation
        setTimeout(function() {
            targetSection.classList.remove('d-none');
            // Force reflow
            targetSection.offsetHeight;
            setTimeout(function() {
                targetSection.style.opacity = '1';
                targetSection.style.transform = 'translateY(0)';
            }, 50);
            
            // Scroll to section on mobile
            if (window.innerWidth < 768) {
                setTimeout(function() {
                    targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 350);
            }
        }, 300);

        // Update active class for navbar
        links.forEach(function(navLink) {
            navLink.classList.remove('active');
            navLink.setAttribute('aria-current', 'false');
        });
        element.classList.add('active');
        element.setAttribute('aria-current', 'page');
    }

    // Initialize first section visibility
    document.addEventListener('DOMContentLoaded', function() {
        const firstSection = document.getElementById('section1');
        if (firstSection) {
            firstSection.style.opacity = '1';
            firstSection.style.transform = 'translateY(0)';
        }
    });

    // Handle keyboard navigation
    document.querySelectorAll('.content-nav .nav-link').forEach(function(link) {
        link.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                link.click();
            }
        });
    });
</script>

<?php
// End of PHP Component
?>