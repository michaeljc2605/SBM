<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Base Styles */
        * {
            box-sizing: border-box;
        }

        /* Process Container Styles */
        .process-container {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: clamp(15px, 3vw, 20px);
            padding: clamp(30px, 6vw, 50px) clamp(15px, 4vw, 30px);
            margin: clamp(25px, 5vh, 40px) 0;
            position: relative;
            overflow: hidden;
        }

        .process-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: clamp(3px, 0.8vw, 5px);
            background: linear-gradient(90deg, #B8A099, #a68d84, #B8A099);
        }

        .process-title {
            color: #B8A099;
            font-weight: 700;
            margin-bottom: clamp(30px, 5vh, 50px);
            text-align: center;
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            line-height: 1.2;
            padding: 0 15px;
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .process-step {
            background: white;
            border-radius: clamp(12px, 2vw, 15px);
            padding: clamp(20px, 4vw, 30px);
            margin: clamp(12px, 2vh, 20px) 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            opacity: 0;
            transform: translateY(30px);
            display: flex;
            flex-direction: column;
        }

        .process-step.animate {
            animation: slideUp 0.6s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .process-step:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(184, 160, 153, 0.2);
        }

        .process-step::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: clamp(3px, 0.8vw, 5px);
            height: 100%;
            background: linear-gradient(180deg, #B8A099, #a68d84);
        }

        .step-number {
            background: linear-gradient(135deg, #B8A099, #a68d84);
            color: white;
            width: clamp(50px, 10vw, 60px);
            height: clamp(50px, 10vw, 60px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: clamp(1.1rem, 3vw, 1.4rem);
            margin-bottom: clamp(15px, 3vh, 20px);
            box-shadow: 0 4px 12px rgba(184, 160, 153, 0.4);
            animation: pulse 2s ease-in-out infinite;
            flex-shrink: 0;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 4px 12px rgba(184, 160, 153, 0.4);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 6px 20px rgba(184, 160, 153, 0.6);
            }
        }

        .step-title {
            color: #B8A099;
            font-weight: 600;
            margin-bottom: clamp(12px, 2vh, 15px);
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            line-height: 1.3;
            min-height: auto;
        }

        .step-description {
            color: #6c757d;
            line-height: 1.6;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            flex-grow: 1;
        }

        .timeline-connector {
            display: none;
        }

        .timeline-arrow {
            position: absolute;
            top: 50%;
            right: -25px;
            transform: translateY(-50%);
            color: #B8A099;
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            z-index: 0;
            opacity: 0.3;
            animation: arrowMove 1.5s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes arrowMove {
            0%, 100% {
                transform: translateY(-50%) translateX(0);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-50%) translateX(10px);
                opacity: 0.6;
            }
        }

        .process-step-container {
            position: relative;
            z-index: 1;
        }

        .process-step-container:last-child .timeline-arrow {
            display: none;
        }

        .process-step {
            position: relative;
            z-index: 2;
        }

        /* Progress Line */
        .progress-line {
            position: absolute;
            top: 90px;
            left: 0;
            width: 0;
            height: 4px;
            background: linear-gradient(90deg, #B8A099, #a68d84);
            z-index: 0;
            transition: width 2s ease-out;
            display: none;
        }

        .progress-line.active {
            width: calc(100% - 60px);
        }

        /* Quote Section */
        .process-quote {
            background: white;
            border-left: clamp(3px, 0.8vw, 4px) solid #B8A099;
            padding: clamp(20px, 4vw, 25px) clamp(20px, 4vw, 30px);
            margin-top: clamp(25px, 4vh, 40px);
            border-radius: clamp(8px, 1.5vw, 10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            animation: fadeIn 1s ease-out 0.5s backwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .process-quote p {
            color: #6c757d;
            font-size: clamp(0.95rem, 2.5vw, 1.1rem);
            margin: 0;
            font-style: italic;
            position: relative;
            padding-left: clamp(25px, 5vw, 30px);
            line-height: 1.6;
        }

        .process-quote p::before {
            content: '"';
            position: absolute;
            left: 0;
            top: clamp(-8px, -1.5vh, -10px);
            font-size: clamp(2rem, 5vw, 3rem);
            color: #B8A099;
            opacity: 0.3;
        }

        /* Bootstrap Grid Classes */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 clamp(12px, 2vw, 15px);
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
            position: relative;
        }

        .col-md-6, .col-lg-3, .col-12 {
            padding: 0 15px;
            width: 100%;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .g-4 > * {
            margin-bottom: clamp(15px, 3vh, 1.5rem);
        }

        .mt-4 {
            margin-top: clamp(20px, 3vh, 1.5rem) !important;
        }

        .text-center {
            text-align: center;
        }

        /* Tablet Portrait (768px - 1023px) */
        @media (min-width: 768px) {
            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .timeline-arrow {
                display: none;
            }
        }

        /* Desktop (992px and up) */
        @media (min-width: 992px) {
            .col-lg-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }

            .timeline-arrow {
                display: block;
            }

            .progress-line {
                display: block;
            }
        }

        /* Large Desktop (1200px and up) */
        @media (min-width: 1200px) {
            .step-title {
                min-height: 60px;
                display: flex;
                align-items: center;
            }

            .step-description {
                min-height: 120px;
                display: flex;
                align-items: center;
            }
        }

        /* Mobile Landscape (576px - 767px) */
        @media (min-width: 576px) and (max-width: 767px) {
            .process-step {
                padding: 22px;
            }
        }

        /* Mobile Portrait (up to 575px) */
        @media (max-width: 575px) {
            .process-container {
                padding: 25px 12px;
                margin: 20px 0;
                border-radius: 15px;
            }

            .process-title {
                margin-bottom: 25px;
            }

            .process-step {
                padding: 18px;
                margin: 10px 0;
            }

            .step-number {
                margin-bottom: 12px;
            }

            .step-title {
                margin-bottom: 10px;
            }

            .process-quote {
                padding: 18px 15px;
                margin-top: 20px;
            }

            .process-quote p {
                padding-left: 22px;
            }
        }

        /* Extra Small Mobile (up to 375px) */
        @media (max-width: 375px) {
            .process-container {
                padding: 20px 10px;
            }

            .process-step {
                padding: 15px;
            }

            .process-quote {
                padding: 15px 12px;
            }
        }

        /* Touch device improvements */
        @media (hover: none) and (pointer: coarse) {
            .process-step:hover {
                transform: none;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .process-step:active {
                transform: scale(0.98);
            }

            .step-number {
                animation: none;
            }
        }

        /* Landscape orientation on mobile */
        @media (orientation: landscape) and (max-height: 500px) {
            .process-container {
                padding: 20px 15px;
            }

            .process-title {
                margin-bottom: 20px;
                font-size: 1.5rem;
            }

            .process-step {
                padding: 18px;
                margin: 8px 0;
            }

            .step-description {
                font-size: 0.85rem;
                line-height: 1.4;
            }

            .process-quote {
                margin-top: 20px;
                padding: 15px 20px;
            }
        }

        /* Print styles */
        @media print {
            .process-container {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .process-step {
                break-inside: avoid;
                page-break-inside: avoid;
            }

            .timeline-arrow {
                display: none;
            }

            .progress-line {
                display: none;
            }
        }

        /* High contrast mode */
        @media (prefers-contrast: high) {
            .process-step::before {
                width: 6px;
            }

            .process-quote {
                border-left-width: 5px;
            }
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .process-step,
            .step-number,
            .timeline-arrow,
            .progress-line,
            .process-title,
            .process-quote {
                animation: none;
                transition: none;
            }

            .process-step:hover {
                transform: none;
            }
        }

        /* High DPI screens */
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .process-step {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="process-container">
            <h2 class="process-title">Our Manufacturing Process</h2>
            <div class="row g-4">
                <div class="progress-line" id="progressLine"></div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="process-step-container">
                        <div class="process-step" data-step="1">
                            <div class="step-number">1</div>
                            <h5 class="step-title">Design & Consulting</h5>
                            <p class="step-description">We collaborate closely with you to understand your vision and requirements. Our expert team captures your ideas and transforms them into innovative packaging concepts.</p>
                        </div>
                        <div class="timeline-arrow"><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step-container">
                        <div class="process-step" data-step="2">
                            <div class="step-number">2</div>
                            <h5 class="step-title">Layout Design Creation</h5>
                            <p class="step-description">Our creative professionals develop detailed layout designs that bring your concept to life, incorporating industry expertise with your unique brand vision for results.</p>
                        </div>
                        <div class="timeline-arrow"><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step-container">
                        <div class="process-step" data-step="3">
                            <div class="step-number">3</div>
                            <h5 class="step-title">Testing & Proof</h5>
                            <p class="step-description">We provide comprehensive testing results and physical proof samples for your review, ensuring every detail meets your standards before production begins.</p>
                        </div>
                        <div class="timeline-arrow"><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step-container">
                        <div class="process-step" data-step="4">
                            <div class="step-number">4</div>
                            <h5 class="step-title">Fast Delivery</h5>
                            <p class="step-description">Complete production and delivery within 14 working days (approximately 3 weeks), ensuring you receive your premium packaging solutions right on schedule.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quote Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="process-quote">
                        <p>From your initial idea to final delivery in just 3 weeks - experience our streamlined process that puts your vision first.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Check for reduced motion preference
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Animate steps on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting && !prefersReducedMotion) {
                    setTimeout(() => {
                        entry.target.classList.add('animate');
                    }, index * 200);
                } else if (entry.isIntersecting) {
                    // Instant show for reduced motion preference
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe all process steps
        document.querySelectorAll('.process-step').forEach(step => {
            observer.observe(step);
        });

        // Animate progress line (desktop only)
        const progressLine = document.getElementById('progressLine');
        const processContainer = document.querySelector('.process-container');
        
        if (window.innerWidth >= 992 && !prefersReducedMotion) {
            const progressObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            progressLine.classList.add('active');
                        }, 800);
                    }
                });
            }, {
                threshold: 0.3
            });

            progressObserver.observe(processContainer);
        }

        // Add hover effect to enhance interactivity (non-touch devices only)
        if (window.matchMedia('(hover: hover)').matches) {
            document.querySelectorAll('.process-step').forEach(step => {
                step.addEventListener('mouseenter', function() {
                    if (!prefersReducedMotion) {
                        this.querySelector('.step-number').style.animationPlayState = 'paused';
                    }
                });
                
                step.addEventListener('mouseleave', function() {
                    if (!prefersReducedMotion) {
                        this.querySelector('.step-number').style.animationPlayState = 'running';
                    }
                });
            });
        }

        // Sequential animation trigger on load
        if (!prefersReducedMotion) {
            window.addEventListener('load', function() {
                const steps = document.querySelectorAll('.process-step');
                steps.forEach((step, index) => {
                    setTimeout(() => {
                        step.style.animationDelay = `${index * 0.2}s`;
                    }, 100);
                });
            });
        }

        // Handle window resize for responsive adjustments
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Hide progress line on mobile/tablet
                if (window.innerWidth < 992) {
                    progressLine.style.display = 'none';
                } else {
                    progressLine.style.display = 'block';
                }
            }, 250);
        });
    </script>
</body>
</html>