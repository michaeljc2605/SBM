<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Sumber Berlian Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: white;
            padding: clamp(60px, 12vh, 80px) 0 clamp(50px, 10vh, 70px);
            position: relative;
            overflow: hidden;
            margin-top: 0;
            padding-top: clamp(80px, 15vh, 100px);
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
            pointer-events: none;
        }

        .page-header .container {
            position: relative;
            z-index: 2;
        }

        .page-header h1 {
            font-size: clamp(2.5rem, 7vw, 3.5rem) !important;
            font-weight: 700;
            margin-bottom: clamp(12px, 2vh, 20px) !important;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .page-header .lead {
            font-size: clamp(1rem, 2.5vw, 1.25rem) !important;
            opacity: 0.95;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 0 auto;
        }

        .page-header .row {
            padding: 0 clamp(15px, 4vw, 20px);
        }

        /* Section Spacing */
        section {
            padding: clamp(40px, 8vh, 60px) 0;
        }

        .container {
            padding-left: clamp(15px, 4vw, 20px);
            padding-right: clamp(15px, 4vw, 20px);
        }

        /* Smooth Animations */
        section, .container {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        section.visible, .container.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Tablet Portrait (768px - 1023px) */
        @media (min-width: 768px) and (max-width: 1023px) {
            .page-header {
                padding: 70px 0 60px;
            }
        }

        /* Mobile Landscape (576px - 767px) */
        @media (min-width: 576px) and (max-width: 767px) {
            .page-header {
                padding: 60px 0 50px;
            }
        }

        /* Mobile Portrait (up to 575px) */
        @media (max-width: 575px) {
            .page-header {
                padding: 70px 0 40px;
                padding-top: 70px;
            }

            .page-header h1 {
                font-size: 2rem !important;
            }

            .page-header .lead {
                font-size: 1rem !important;
            }
        }

        /* Extra Small Mobile (up to 375px) */
        @media (max-width: 375px) {
            .page-header {
                padding: 65px 0 35px;
                padding-top: 65px;
            }

            .page-header h1 {
                font-size: 1.8rem !important;
            }
        }

        /* Landscape orientation on mobile */
        @media (orientation: landscape) and (max-height: 500px) {
            .page-header {
                padding: 60px 0 35px;
                padding-top: 60px;
            }

            .page-header h1 {
                font-size: 2rem !important;
                margin-bottom: 10px !important;
            }

            .page-header .lead {
                font-size: 0.95rem !important;
            }
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            section, .container {
                transition: none;
                animation: none;
            }

            .page-header::before {
                animation: none;
            }
        }

        /* Print styles */
        @media print {
            .page-header {
                background: #1a1a2e !important;
                padding: 30px 0;
                padding-top: 30px;
            }

            .page-header::before {
                display: none;
            }

            section, .container {
                opacity: 1 !important;
                transform: none !important;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Anchor offset for fixed navbar */
        [id] {
            scroll-margin-top: clamp(70px, 12vh, 90px);
        }

        /* Loading animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-header .container {
            animation: fadeInUp 0.8s ease-out;
        }

        /* Responsive text alignment */
        @media (max-width: 767px) {
            .text-center {
                text-align: center !important;
            }
        }

        /* Better spacing for mobile */
        @media (max-width: 575px) {
            section {
                padding: 30px 0;
            }

            .mb-3 {
                margin-bottom: 1rem !important;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            .page-header {
                border-bottom: 3px solid white;
            }
        }

        /* Focus styles for accessibility */
        a:focus, button:focus {
            outline: 3px solid #0f3460;
            outline-offset: 2px;
        }

        /* Ensure proper spacing after navbar */
        body {
            padding-top: 0;
        }

        /* Better responsive container */
        @media (min-width: 1400px) {
            .container {
                max-width: 1320px;
            }
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    <?php include("navbar.php"); ?>
    
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 mb-3">About Us</h1>
                    <p class="lead">Learn more about Sumber Berlian Mandiri</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- About Page Components -->
    <?php include("aboutUs/company-story.php"); ?>
    <?php include("aboutUs/vision-mission.php"); ?>
    <?php include("aboutUs/meet-our-team.php"); ?>
    
    <!-- Reuse some components from main page if needed -->
    <?php include("mainpage/whyus.php"); ?>
    <?php include("mainpage/cta.php"); ?>
    <?php include("Footer.php"); ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Check for reduced motion preference
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: prefersReducedMotion ? 'auto' : 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
        
        // Add fade-in animation on scroll (only if motion is allowed)
        if (!prefersReducedMotion) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        // Stop observing after animation
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            // Observe all sections
            document.addEventListener('DOMContentLoaded', function() {
                const sections = document.querySelectorAll('section, .container');
                sections.forEach(section => {
                    observer.observe(section);
                });
            });
        } else {
            // If reduced motion, show all immediately
            document.addEventListener('DOMContentLoaded', function() {
                const sections = document.querySelectorAll('section, .container');
                sections.forEach(section => {
                    section.classList.add('visible');
                });
            });
        }

        // Add smooth scroll behavior polyfill for older browsers
        if (!('scrollBehavior' in document.documentElement.style)) {
            const smoothscroll = () => {
                const links = document.querySelectorAll('a[href^="#"]');
                links.forEach(link => {
                    link.addEventListener('click', function(e) {
                        const href = this.getAttribute('href');
                        if (href !== '#' && href.length > 1) {
                            e.preventDefault();
                            const target = document.querySelector(href);
                            if (target) {
                                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
                                const startPosition = window.pageYOffset;
                                const distance = targetPosition - startPosition - 80;
                                const duration = 1000;
                                let start = null;
                                
                                window.requestAnimationFrame(function step(timestamp) {
                                    if (!start) start = timestamp;
                                    const progress = timestamp - start;
                                    const percent = Math.min(progress / duration, 1);
                                    window.scrollTo(0, startPosition + distance * percent);
                                    if (progress < duration) {
                                        window.requestAnimationFrame(step);
                                    }
                                });
                            }
                        }
                    });
                });
            };
            smoothscroll();
        }

        // Performance optimization: Debounce scroll events
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) {
                window.cancelAnimationFrame(scrollTimeout);
            }
            scrollTimeout = window.requestAnimationFrame(function() {
                // Additional scroll-based animations can be added here
            });
        }, { passive: true });

        // Prevent FOUC (Flash of Unstyled Content)
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.visibility = 'visible';
        });
    </script>
</body>
</html>