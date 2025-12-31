<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Timeline</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        .timeline-container {
            position: relative;
            padding: 20px 0;
        }

        /* Desktop Vertical Line */
        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, #4a90e2, #28a745, #ffc107, #dc3545, #6f42c1);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Timeline Items */
        .timeline-item {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .timeline-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        /* Content Cards */
        .timeline-card {
            background: white;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .timeline-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
        }

        .timeline-card h5 {
            color: #1a1a1a;
            font-size: 1.25rem;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .timeline-card p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 0;
            font-size: 0.95rem;
        }

        /* Year Badges */
        .timeline-year-badge {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .timeline-year-badge .badge {
            font-size: 1rem;
            padding: 10px 20px;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            letter-spacing: 0.5px;
        }

        /* Desktop Layout */
        @media (min-width: 769px) {
            .timeline-item {
                margin-bottom: 80px !important;
            }

            .timeline-content-left {
                padding-right: 40px;
                text-align: right;
            }

            .timeline-content-right {
                padding-left: 140px;
                margin-left: 0 !important;
            }

            .timeline-year-badge {
                top: 0;
            }

            /* Remove the connecting dots on desktop */
            .timeline-year-badge::after {
                display: none;
            }
        }

        /* Mobile Layout - Timeline on Left, Content on Right */
        @media (max-width: 768px) {
            .timeline-line {
                left: 24px !important;
                transform: translateX(-50%) !important;
                width: 2px;
            }

            .timeline-item {
                flex-direction: row !important;
                align-items: flex-start !important;
                margin-bottom: 40px !important;
            }

            .timeline-content-left,
            .timeline-content-right {
                width: 100% !important;
                text-align: left !important;
                padding-left: 70px !important;
                padding-right: 16px !important;
            }

            .timeline-year-badge {
                left: 24px !important;
                transform: translateX(-50%) !important;
                top: 0 !important;
            }

            .timeline-year-badge .badge {
                font-size: 0.85rem;
                padding: 8px 14px;
            }

            .timeline-card {
                padding: 20px;
                margin-left: 0 !important;
            }

            .timeline-card h5 {
                font-size: 1.1rem;
            }

            .timeline-card p {
                font-size: 0.9rem;
            }

            /* Add connecting dots */
            .timeline-year-badge::after {
                content: '';
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 16px;
                height: 16px;
                background: white;
                border: 3px solid currentColor;
                border-radius: 50%;
                z-index: -1;
            }
        }

        /* Header Styling */
        .section-header {
            margin-bottom: 60px;
        }

        .section-header h3 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 16px;
        }

        .section-header .highlight {
            color: #91756D;
        }

        .section-header p {
            font-size: 1.1rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }

        @media (max-width: 768px) {
            .section-header h3 {
                font-size: 1.8rem;
            }

            .section-header p {
                font-size: 1rem;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Section background */
        .company-story-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 80px 0;
        }

        @media (max-width: 768px) {
            .company-story-section {
                padding: 50px 0;
            }
        }
    </style>
</head>
<body>

<!-- Company Story Section -->
<section class="company-story-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center section-header">
                <h3>COMPANY <span class="highlight">BACKGROUND</span></h3>
                <p>
                    PT. Sumber Berlian Mandiri, established in 2021, began as a wood-focused enterprise specializing in the manufacturing and export of various wood products. Building on our strong foundation to become the best box converter in Indonesia
                </p>
            </div>
        </div>
        
        <!-- Timeline -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="timeline-container">
                    <!-- Vertical Line -->
                    <div class="timeline-line"></div>
                    
                    <!-- Timeline Item 1 - Foundation -->
                    <div class="timeline-item d-flex align-items-center mb-5 position-relative">
                        <div class="timeline-content-left col-md-5">
                            <div class="timeline-card">
                                <h5>Foundation Year</h5>
                                <p>
                                    PT. Sumber Berlian Mandiri was established as a wood manufacturing company, 
                                    focusing on creating high-quality wood products for domestic and international markets.
                                </p>
                            </div>
                        </div>
                        <div class="timeline-year-badge">
                            <span class="badge rounded-pill text-white" style="background: linear-gradient(135deg, #4a90e2, #357abd);">2021</span>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    
                    <!-- Timeline Item 2 - Regional Expansion -->
                    <div class="timeline-item d-flex align-items-center mb-5 position-relative">
                        <div class="col-md-5"></div>
                        <div class="timeline-year-badge">
                            <span class="badge rounded-pill text-white" style="background: linear-gradient(135deg, #28a745, #20c997);">2022</span>
                        </div>
                        <div class="timeline-content-right col-md-5">
                            <div class="timeline-card">
                                <h5>Regional Expansion</h5>
                                <p>
                                    Successfully expanded our market reach beyond Java island, establishing sales networks 
                                    and distribution channels across other regional islands in Indonesia.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Item 3 - Business Diversification -->
                    <div class="timeline-item d-flex align-items-center mb-5 position-relative">
                        <div class="timeline-content-left col-md-5">
                            <div class="timeline-card">
                                <h5>Business Diversification</h5>
                                <p>
                                    Expanded our operations into carton box manufacturing, partnering with our parent company 
                                    PT. Sumber Intan Mandiri to provide comprehensive packaging solutions.
                                </p>
                            </div>
                        </div>
                        <div class="timeline-year-badge">
                            <span class="badge rounded-pill text-white" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">2023</span>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    
                    <!-- Timeline Item 4 - Technology Integration -->
                    <div class="timeline-item d-flex align-items-center mb-5 position-relative">
                        <div class="col-md-5"></div>
                        <div class="timeline-year-badge">
                            <span class="badge rounded-pill text-white" style="background: linear-gradient(135deg, #dc3545, #c82333);">2024</span>
                        </div>
                        <div class="timeline-content-right col-md-5">
                            <div class="timeline-card">
                                <h5>Technology Integration</h5>
                                <p>
                                    Implemented advanced manufacturing technologies and quality control systems, 
                                    enhancing production efficiency and product quality standards across all divisions.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Item 5 - Sustainable Growth -->
                    <div class="timeline-item d-flex align-items-center position-relative">
                        <div class="timeline-content-left col-md-5">
                            <div class="timeline-card">
                                <h5>Sustainable Growth</h5>
                                <p>
                                    Continuing our commitment to sustainable manufacturing practices and expanding our 
                                    market presence while maintaining the highest quality standards in all our products.
                                </p>
                            </div>
                        </div>
                        <div class="timeline-year-badge">
                            <span class="badge rounded-pill text-white" style="background: linear-gradient(135deg, #6f42c1, #5a32a3);">2025</span>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Animate timeline items on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const timelineItems = document.querySelectorAll('.timeline-item');
        
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -80px 0px'
        };
        
        const timelineObserver = new IntersectionObserver(function(entries) {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, observerOptions);
        
        timelineItems.forEach(item => {
            timelineObserver.observe(item);
        });
    });
</script>

</body>
</html>