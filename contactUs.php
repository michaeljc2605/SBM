<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sumber Berlian Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f0ed 0%, #e8ddd8 100%);
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #B8A099 0%, #9d857c 50%, #8a6f65 100%);
            color: white;
            padding: 100px 0 80px;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            position: relative;
        }

        .contact-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(184, 160, 153, 0.15);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(184, 160, 153, 0.25);
        }

        .contact-info {
            padding: 60px 50px;
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 50%, #947a70 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .contact-info::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .contact-info h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
        }

        .contact-info-text {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 40px;
            opacity: 0.95;
            position: relative;
        }

        .contact-item {
            margin-bottom: 40px;
            position: relative;
            padding-left: 70px;
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .contact-item:nth-child(1) { animation-delay: 0.1s; }
        .contact-item:nth-child(2) { animation-delay: 0.2s; }
        .contact-item:nth-child(3) { animation-delay: 0.3s; }

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

        .contact-icon {
            position: absolute;
            left: 0;
            top: 0;
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .contact-item:hover .contact-icon {
            background: rgba(255,255,255,0.3);
            transform: scale(1.1) rotate(360deg);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .contact-label {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-value {
            font-size: 1.1rem;
            font-weight: 500;
            line-height: 1.6;
        }

        .contact-value a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .contact-value a:hover {
            opacity: 0.8;
            text-decoration: underline;
        }

        .map-container {
            height: 100%;
            min-height: 500px;
            border-radius: 0 20px 20px 0;
            overflow: hidden;
            position: relative;
        }

        .map-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(184, 160, 153, 0.1) 0%, transparent 100%);
            pointer-events: none;
            z-index: 1;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            filter: grayscale(0.2) sepia(0.1);
            transition: filter 0.3s ease;
        }

        .map-container:hover iframe {
            filter: grayscale(0) sepia(0);
        }

        /* Email Categories */
        .email-category {
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }

        .email-category:hover {
            background: rgba(255,255,255,0.25);
            transform: translateX(10px);
            border-color: rgba(255,255,255,0.3);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .email-category-title {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .email-category-address {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Floating Animation */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .contact-info {
                padding: 40px 30px;
                border-radius: 20px 20px 0 0;
            }

            .map-container {
                border-radius: 0 0 20px 20px;
                min-height: 400px;
            }

            .contact-item {
                padding-left: 60px;
            }

            .contact-section {
                padding: 40px 0;
            }
        }

        /* Additional Decorative Elements */
        .decoration-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            animation: float 6s ease-in-out infinite;
        }

        .decoration-circle:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.05) 100%);
        }

        .decoration-circle:nth-child(2) {
            width: 150px;
            height: 150px;
            bottom: 15%;
            right: 10%;
            animation-delay: 2s;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.03) 100%);
        }

        .decoration-circle:nth-child(3) {
            width: 80px;
            height: 80px;
            top: 60%;
            left: 15%;
            animation-delay: 4s;
            background: radial-gradient(circle, rgba(255,255,255,0.18) 0%, rgba(255,255,255,0.04) 100%);
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
            }
        }

        /* Copy notification */
        .copy-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(184, 160, 153, 0.3);
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    <?php include("navbar.php"); ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="decoration-circle"></div>
        <div class="decoration-circle"></div>
        <div class="decoration-circle"></div>
        <div class="container hero-content">
            <div class="floating">
                <h1 class="hero-title">
                    <i class="fas fa-envelope-open-text me-3"></i>
                    Hubungi Kami
                </h1>
            </div>
            <p class="hero-subtitle">
                Kami siap membantu Anda. Hubungi tim kami untuk informasi lebih lanjut tentang produk dan layanan Sumber Berlian Mandiri.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-0 contact-card">
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <div class="contact-info h-100">
                        <h3>Informasi Kontak</h3>
                        <p class="contact-info-text">
                            Kami menghubungkan pemimpin di sekitar tujuan bersama dan cerita strategis yang mengkatalisasi bisnis dan merek mereka untuk mengambil tindakan.
                        </p>

                        <!-- Email Section -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-label">Email</div>
                            <div class="contact-value">
                                <div class="email-category">
                                    <div class="email-category-title">Sales Inquiry</div>
                                    <div class="email-category-address">
                                        <a href="mailto:sbmsalesinfo@gmail.com">SBMSalesInfo@gmail.com</a>
                                    </div>
                                </div>
                                <div class="email-category">
                                    <div class="email-category-title">Job Inquiry</div>
                                    <div class="email-category-address">
                                        <a href="mailto:sbmrecruitinfo@gmail.com">SBMRecruitInfo@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Section -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-label">Telepon</div>
                            <div class="contact-value">
                                <a href="tel:+6281234533210">+62 (81) 234533210</a>
                            </div>
                        </div>

                        <!-- Location Section -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-label">Lokasi</div>
                            <div class="contact-value">
                                Krian, Sidoarjo<br>
                                East Java, Indonesia
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="col-lg-7">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5367.507367428225!2d112.57557377293807!3d-7.40130999875695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e51c25ed9221%3A0x6fe0fc47481859bf!2sSumber%20Berlian%20Mandiri!5e0!3m2!1sen!2sid!4v1765604806960!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("Footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scroll animation on load
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to elements when they come into view
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, observerOptions);

            // Observe contact items
            document.querySelectorAll('.contact-item').forEach(item => {
                observer.observe(item);
            });

            // Add parallax effect to hero section
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const hero = document.querySelector('.hero-section');
                if (hero) {
                    hero.style.transform = `translateY(${scrolled * 0.5}px)`;
                }
            });

            // Add hover effect to email categories
            document.querySelectorAll('.email-category').forEach(category => {
                category.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(10px) scale(1.02)';
                });
                category.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0) scale(1)';
                });
            });
        });

        // Add click to copy functionality for email addresses
        document.querySelectorAll('.email-category-address a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const email = this.textContent;
                navigator.clipboard.writeText(email).then(() => {
                    // Show notification
                    const notification = document.createElement('div');
                    notification.className = 'copy-notification';
                    notification.innerHTML = '<i class="fas fa-check-circle me-2"></i>Email berhasil disalin!';
                    document.body.appendChild(notification);
                    setTimeout(() => {
                        notification.style.animation = 'slideIn 0.3s ease-out reverse';
                        setTimeout(() => notification.remove(), 300);
                    }, 2000);
                });
            });
        });
    </script>
</body>
</html>