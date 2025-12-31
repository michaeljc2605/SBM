<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBM - Video Banner</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Video Banner Styles */
        .video-banner-container {
            height: 100vh;
            min-height: 600px;
            overflow: hidden;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner-video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            object-fit: cover;
            z-index: -2;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(145, 117, 109, 0.7), rgba(166, 139, 122, 0.6));
            z-index: -1;
        }

        .banner-content {
            text-align: center;
            color: white;
            z-index: 2;
            max-width: 90%;
            padding: 0 clamp(15px, 5vw, 40px);
            animation: fadeInUp 1s ease-out;
        }

        .banner-subtitle {
            font-size: clamp(1rem, 3vw, 1.8rem);
            font-weight: 500;
            margin-bottom: clamp(12px, 2vh, 20px);
            color: #91756D;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 1px;
        }

        .banner-title {
            font-size: clamp(1.8rem, 6vw, 4rem);
            font-weight: 800;
            margin-bottom: clamp(20px, 3vh, 30px);
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
            letter-spacing: -1px;
            line-height: 1.1;
        }

        .banner-description {
            font-size: clamp(0.9rem, 2.5vw, 1.3rem);
            font-weight: 400;
            margin-bottom: clamp(25px, 4vh, 40px);
            opacity: 0.95;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
            line-height: 1.5;
            max-width: min(800px, 90%);
            margin-left: auto;
            margin-right: auto;
        }

        .banner-buttons {
            display: flex;
            gap: clamp(12px, 3vw, 20px);
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-consult {
            background: linear-gradient(135deg, #91756D, #A68B7A);
            border: none;
            color: white;
            padding: clamp(12px, 2vh, 15px) clamp(25px, 5vw, 35px);
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            display: inline-flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-width: 160px;
            justify-content: center;
        }

        .btn-consult:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(145, 117, 109, 0.4);
            color: white;
        }

        .btn-services {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.8);
            color: white;
            padding: clamp(12px, 2vh, 15px) clamp(25px, 5vw, 35px);
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-width: 160px;
            justify-content: center;
        }

        .btn-services:hover {
            background: rgba(255, 255, 255, 0.9);
            color: #91756D;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
        }

        .btn-services::after {
            content: "→";
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .btn-services:hover::after {
            transform: translateX(5px);
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Tablet Landscape (1024px - 1199px) */
        @media (min-width: 1024px) and (max-width: 1199px) {
            .video-banner-container {
                height: 85vh;
                min-height: 650px;
            }
        }

        /* Tablet Portrait (768px - 1023px) */
        @media (min-width: 768px) and (max-width: 1023px) {
            .video-banner-container {
                height: 90vh;
                min-height: 600px;
            }

            .banner-content {
                max-width: 85%;
            }

            .banner-buttons {
                gap: 15px;
            }
        }

        /* Mobile Landscape (576px - 767px) */
        @media (min-width: 576px) and (max-width: 767px) {
            .video-banner-container {
                height: 85vh;
                min-height: 500px;
            }

            .banner-content {
                max-width: 90%;
            }

            .banner-description {
                max-width: 95%;
            }
        }

        /* Mobile Portrait (up to 575px) */
        @media (max-width: 575px) {
            .video-banner-container {
                height: 100vh;
                min-height: 550px;
            }

            .banner-content {
                max-width: 95%;
                padding: 0 20px;
            }

            .banner-title {
                word-break: break-word;
            }

            .banner-description {
                max-width: 100%;
            }

            .banner-buttons {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
                width: 100%;
                max-width: 280px;
                margin: 0 auto;
            }

            .btn-consult,
            .btn-services {
                width: 100%;
                min-width: auto;
            }
        }

        /* Extra Small Mobile (up to 375px) */
        @media (max-width: 375px) {
            .video-banner-container {
                min-height: 500px;
            }

            .banner-content {
                padding: 0 15px;
            }

            .banner-buttons {
                max-width: 250px;
            }
        }

        /* Orientation-specific adjustments */
        @media (orientation: landscape) and (max-height: 500px) {
            .video-banner-container {
                height: auto;
                min-height: 100vh;
                padding: 40px 0;
            }

            .banner-content {
                padding: 20px;
            }

            .banner-title {
                margin-bottom: 15px;
            }

            .banner-description {
                margin-bottom: 20px;
            }
        }

        /* High DPI screens */
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .banner-video {
                image-rendering: -webkit-optimize-contrast;
            }
        }

        /* Touch device improvements */
        @media (hover: none) and (pointer: coarse) {
            .btn-consult,
            .btn-services {
                min-height: 48px;
                padding: 14px 30px;
            }

            .btn-consult:active {
                transform: scale(0.98);
            }

            .btn-services:active {
                transform: scale(0.98);
            }
        }
    </style>
</head>
<body>
    <!-- Video Banner -->
    <div class="video-banner-container">
        <video class="banner-video" autoplay muted loop playsinline>
            <source src="static/SBM-Video-Banner.mp4" type="video/mp4">
            <!-- Fallback for browsers that don't support video -->
            <img src="static/b&c-flute-cardboard.jpg" alt="Carton packaging" class="banner-video">
        </video>
        
        <div class="video-overlay"></div>
        
        <div class="banner-content">
            <h2 class="banner-subtitle">Smart. Sustainable. Strong.</h2>
            <h1 class="banner-title">Custom Carton Solutions</h1>
            <p class="banner-description">
                Sumber Berlian Mandiri specializes in creating custom carton packaging that enhances 
                your product's appeal, protects during transit, and aligns with your brand identity.
            </p>
            <div class="banner-buttons">
                <a href="/SBM/contactUs.php" class="btn-consult">Contact Us</a>
                <a href="/SBM/Cartons.php" class="btn-services">Our Cartons</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>