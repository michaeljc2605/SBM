<?php

// Lightweight Why Us Component with #91756D Theme
class LightWhyUsComponent {
    private $title;
    private $subtitle;
    private $features;
    
    public function __construct($title = "Why Choose Us?", $subtitle = "Discover what makes us different") {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->features = [];
    }
    
    public function addFeature($icon, $title, $description) {
        $this->features[] = [
            'icon' => $icon,
            'title' => $title,
            'description' => $description
        ];
        return $this;
    }
    
    public function render() {
        ob_start();
        ?>
        <style>
            /* Base Styles */
            .light-why-us {
                background: linear-gradient(135deg, #91756D 0%, #A68B82 50%, #B8A099 100%);
                padding: clamp(40px, 8vh, 60px) clamp(15px, 4vw, 20px);
                color: white;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
                position: relative;
                overflow: hidden;
            }
            
            /* Optional decorative elements */
            .light-why-us::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
                pointer-events: none;
            }
            
            .light-why-us-content {
                max-width: 1200px;
                margin: 0 auto;
                text-align: center;
                position: relative;
                z-index: 1;
            }
            
            .light-why-us h2 {
                font-size: clamp(1.8rem, 5vw, 2.5rem);
                margin-bottom: clamp(12px, 2vh, 16px);
                font-weight: 700;
                line-height: 1.2;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            }
            
            .light-why-us > .light-why-us-content > p {
                font-size: clamp(1rem, 2.5vw, 1.2rem);
                margin-bottom: clamp(35px, 6vh, 50px);
                opacity: 0.95;
                line-height: 1.5;
                max-width: 700px;
                margin-left: auto;
                margin-right: auto;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            }
            
            .light-features-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(min(280px, 100%), 1fr));
                gap: clamp(20px, 4vw, 30px);
                padding: 0;
            }
            
            .light-feature-card {
                background: rgba(255, 255, 255, 0.1);
                border-radius: clamp(10px, 2vw, 12px);
                padding: clamp(25px, 5vw, 30px) clamp(18px, 4vw, 20px);
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.15);
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                position: relative;
            }
            
            .light-feature-card::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 0;
                height: 2px;
                background: white;
                transition: width 0.3s ease;
            }
            
            .light-feature-card:hover {
                transform: translateY(-5px);
                background: rgba(255, 255, 255, 0.18);
                box-shadow: 0 8px 25px rgba(145, 117, 109, 0.4);
                border-color: rgba(255, 255, 255, 0.3);
            }
            
            .light-feature-card:hover::after {
                width: 60%;
            }
            
            .light-feature-icon {
                font-size: clamp(2rem, 5vw, 2.5rem);
                margin-bottom: clamp(12px, 2vh, 15px);
                display: block;
                filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
            }
            
            .light-feature-title {
                font-size: clamp(1.1rem, 2.8vw, 1.3rem);
                font-weight: 600;
                margin-bottom: clamp(8px, 1.5vh, 10px);
                line-height: 1.3;
            }
            
            .light-feature-description {
                font-size: clamp(0.9rem, 2vw, 1rem);
                line-height: 1.6;
                opacity: 0.85;
                flex-grow: 1;
            }
            
            /* Tablet Landscape (1024px - 1199px) */
            @media (min-width: 1024px) and (max-width: 1199px) {
                .light-features-grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }
            
            /* Tablet Portrait (768px - 1023px) */
            @media (min-width: 768px) and (max-width: 1023px) {
                .light-features-grid {
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 25px;
                }
                
                .light-feature-card {
                    padding: 28px 18px;
                }
            }
            
            /* Mobile Landscape (576px - 767px) */
            @media (min-width: 576px) and (max-width: 767px) {
                .light-features-grid {
                    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                    gap: 20px;
                }
                
                .light-feature-card {
                    padding: 25px 15px;
                }
            }
            
            /* Mobile Portrait (up to 575px) */
            @media (max-width: 575px) {
                .light-why-us {
                    padding: 35px 15px;
                }
                
                .light-why-us h2 {
                    margin-bottom: 10px;
                }
                
                .light-why-us > .light-why-us-content > p {
                    margin-bottom: 30px;
                }
                
                .light-features-grid {
                    grid-template-columns: 1fr;
                    gap: 18px;
                }
                
                .light-feature-card {
                    max-width: 450px;
                    margin: 0 auto;
                    width: 100%;
                }
            }
            
            /* Extra Small Mobile (up to 375px) */
            @media (max-width: 375px) {
                .light-why-us {
                    padding: 30px 12px;
                }
                
                .light-features-grid {
                    gap: 15px;
                }
                
                .light-feature-card {
                    padding: 20px 15px;
                }
            }
            
            /* Touch device improvements */
            @media (hover: none) and (pointer: coarse) {
                .light-feature-card:hover {
                    transform: none;
                    background: rgba(255, 255, 255, 0.1);
                    box-shadow: none;
                }
                
                .light-feature-card:active {
                    transform: scale(0.98);
                    background: rgba(255, 255, 255, 0.15);
                }
                
                .light-feature-card::after {
                    display: none;
                }
            }
            
            /* Landscape orientation on mobile */
            @media (orientation: landscape) and (max-height: 500px) {
                .light-why-us {
                    padding: 30px 15px;
                }
                
                .light-why-us h2 {
                    font-size: 1.8rem;
                    margin-bottom: 10px;
                }
                
                .light-why-us > .light-why-us-content > p {
                    font-size: 1rem;
                    margin-bottom: 25px;
                }
                
                .light-features-grid {
                    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                    gap: 18px;
                }
                
                .light-feature-card {
                    padding: 20px 15px;
                }
                
                .light-feature-icon {
                    font-size: 2rem;
                    margin-bottom: 10px;
                }
            }
            
            /* Print styles */
            @media print {
                .light-why-us {
                    background: #91756D !important;
                    color: black !important;
                }
                
                .light-why-us::before {
                    display: none;
                }
                
                .light-feature-card {
                    border: 1px solid #ccc;
                    background: white !important;
                    color: black !important;
                    break-inside: avoid;
                    page-break-inside: avoid;
                }
            }
            
            /* High contrast mode */
            @media (prefers-contrast: high) {
                .light-feature-card {
                    border: 2px solid rgba(255, 255, 255, 0.5);
                }
                
                .light-feature-description {
                    opacity: 1;
                }
            }
            
            /* Reduced motion */
            @media (prefers-reduced-motion: reduce) {
                .light-feature-card,
                .light-feature-card::after {
                    transition: none;
                }
                
                .light-feature-card:hover {
                    transform: none;
                }
            }
            
            /* Dark mode support (if needed) */
            @media (prefers-color-scheme: dark) {
                .light-feature-card {
                    background: rgba(255, 255, 255, 0.12);
                    border-color: rgba(255, 255, 255, 0.2);
                }
                
                .light-feature-card:hover {
                    background: rgba(255, 255, 255, 0.2);
                }
            }
            
            /* Wide screens optimization */
            @media (min-width: 1400px) {
                .light-features-grid {
                    max-width: 1300px;
                    margin: 0 auto;
                }
            }
            
            /* Animation for cards on scroll (optional enhancement) */
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
            
            .light-feature-card {
                animation: fadeInUp 0.6s ease-out backwards;
            }
            
            .light-feature-card:nth-child(1) { animation-delay: 0.1s; }
            .light-feature-card:nth-child(2) { animation-delay: 0.2s; }
            .light-feature-card:nth-child(3) { animation-delay: 0.3s; }
            .light-feature-card:nth-child(4) { animation-delay: 0.4s; }
            .light-feature-card:nth-child(5) { animation-delay: 0.5s; }
            .light-feature-card:nth-child(6) { animation-delay: 0.6s; }
            
            @media (prefers-reduced-motion: reduce) {
                .light-feature-card {
                    animation: none;
                }
            }
        </style>
        
        <div class="light-why-us">
            <div class="light-why-us-content">
                <h2><?php echo htmlspecialchars($this->title); ?></h2>
                <p><?php echo htmlspecialchars($this->subtitle); ?></p>
                
                <div class="light-features-grid">
                    <?php foreach ($this->features as $index => $feature): ?>
                        <div class="light-feature-card" role="article" aria-labelledby="feature-title-<?php echo $index; ?>">
                            <span class="light-feature-icon" role="img" aria-label="Feature icon"><?php echo $feature['icon']; ?></span>
                            <h3 class="light-feature-title" id="feature-title-<?php echo $index; ?>"><?php echo htmlspecialchars($feature['title']); ?></h3>
                            <p class="light-feature-description"><?php echo htmlspecialchars($feature['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}

// Example usage - Why Us component
$lightWhyUs = new LightWhyUsComponent(
    "Why Choose Us?",
    "Discover what makes us the preferred choice for premium carton solutions"
);

$lightWhyUs->addFeature("🚀", "Fast Delivery", "Quick turnaround times within 14 working days without compromising quality.")
          ->addFeature("💎", "Premium Quality", "High-quality corrugated solutions that exceed expectations every time.")
          ->addFeature("🛡️", "Secure & Reliable", "Durable packaging with consistent quality and on-time delivery guarantee.")
          ->addFeature("🎨", "Custom Design", "Tailored packaging solutions that perfectly match your brand identity.")
          ->addFeature("🌱", "Sustainable", "Eco-friendly materials and practices for environmentally conscious businesses.")
          ->addFeature("💰", "Cost Effective", "Competitive pricing with exceptional value for your investment.");

echo $lightWhyUs->render();
?>