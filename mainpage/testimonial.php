<?php
// Beautiful Lightweight Testimonial Component with #91756D Theme
class LightTestimonialComponent {
    private $title;
    private $testimonials;
    private $currentIndex = 0;
    
    public function __construct($title = "What Our Clients Say") {
        $this->title = $title;
        $this->testimonials = [];
    }
    
    public function addTestimonial($name, $role, $company, $message, $rating = 5) {
        $this->testimonials[] = [
            'name' => $name,
            'role' => $role,
            'company' => $company,
            'message' => $message,
            'rating' => $rating
        ];
        return $this;
    }
    
    public function render() {
        ob_start();
        ?>
        <style>
            /* Base Styles */
            .light-testimonial {
                background: transparent;
                padding: clamp(50px, 10vh, 80px) clamp(15px, 4vw, 20px);
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                position: relative;
                overflow: hidden;
            }
            
            .light-testimonial::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
                background-size: 40px 40px;
                animation: lightFloat 30s linear infinite;
                pointer-events: none;
            }
            
            @keyframes lightFloat {
                0% { transform: translate(-50%, -50%) rotate(0deg); }
                100% { transform: translate(-50%, -50%) rotate(360deg); }
            }
            
            .light-testimonial-content {
                max-width: 900px;
                margin: 0 auto;
                text-align: center;
                position: relative;
                z-index: 2;
            }
            
            .light-testimonial h2 {
                font-size: clamp(2rem, 5vw, 3rem);
                color: #91756D;
                margin-bottom: clamp(40px, 7vh, 60px);
                font-weight: 300;
                letter-spacing: -1px;
                opacity: 0;
                animation: lightFadeInUp 0.8s ease-out 0.2s forwards;
                line-height: 1.2;
                padding: 0 15px;
            }
            
            @keyframes lightFadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .light-testimonial-card {
                background: rgba(255, 255, 255, 0.95);
                border-radius: clamp(12px, 2vw, 15px);
                padding: clamp(25px, 4vw, 40px) clamp(20px, 5vw, 35px);
                margin-bottom: clamp(25px, 4vh, 30px);
                box-shadow: 0 8px 25px rgba(145, 117, 109, 0.2);
                opacity: 0;
                transform: translateY(15px);
                transition: all 0.4s ease;
                backdrop-filter: blur(10px);
            }
            
            .light-testimonial-card.active {
                opacity: 1;
                transform: translateY(0);
            }
            
            .light-testimonial-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 30px rgba(145, 117, 109, 0.3);
            }
            
            .light-quote-icon {
                font-size: clamp(2rem, 4vw, 3rem);
                color: #91756D;
                margin-bottom: 0;
                opacity: 0.4;
                text-align: left;
                display: block;
                line-height: 1;
            }
            
            .light-testimonial-message {
                font-size: clamp(1rem, 2.5vw, 1.2rem);
                line-height: 1.7;
                color: #4a5568;
                margin-bottom: clamp(20px, 4vh, 25px);
                font-weight: 300;
                text-align: left;
            }
            
            .light-testimonial-author {
                display: flex;
                align-items: center;
                justify-content: flex-start;
                gap: clamp(15px, 3vw, 20px);
            }
            
            .light-author-avatar {
                width: clamp(40px, 8vw, 50px);
                height: clamp(40px, 8vw, 50px);
                min-width: 40px;
                border-radius: 50%;
                background: linear-gradient(135deg, #91756D, #A68B82);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
                font-size: clamp(0.9rem, 2vw, 1.1rem);
                flex-shrink: 0;
                box-shadow: 0 2px 8px rgba(145, 117, 109, 0.3);
            }
            
            .light-author-info {
                text-align: left;
                flex-grow: 1;
            }
            
            .light-author-info h4 {
                margin: 0 0 clamp(3px, 1vh, 5px) 0;
                color: #2d3748;
                font-size: clamp(1rem, 2.5vw, 1.1rem);
                font-weight: 600;
                line-height: 1.3;
            }
            
            .light-author-role {
                color: #718096;
                margin: 0 0 clamp(5px, 1vh, 8px) 0;
                font-size: clamp(0.85rem, 2vw, 0.9rem);
                font-weight: 400;
                line-height: 1.4;
            }
            
            .light-rating {
                display: flex;
                gap: 2px;
                margin-top: clamp(5px, 1vh, 8px);
            }
            
            .light-star {
                color: #D4A574;
                font-size: clamp(0.9rem, 2vw, 1rem);
            }
            
            .light-testimonial-nav {
                display: flex;
                justify-content: center;
                gap: clamp(12px, 3vw, 15px);
                margin-top: clamp(30px, 5vh, 40px);
                flex-wrap: wrap;
            }
            
            .light-nav-btn {
                background: rgba(145, 117, 109, 0.15);
                color: #91756D;
                border: 2px solid rgba(145, 117, 109, 0.3);
                padding: clamp(10px, 2vh, 12px) clamp(20px, 4vw, 25px);
                border-radius: 50px;
                cursor: pointer;
                transition: all 0.3s ease;
                font-weight: 500;
                backdrop-filter: blur(10px);
                font-size: clamp(0.85rem, 2vw, 0.95rem);
                min-height: 44px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 100px;
            }
            
            .light-nav-btn:hover {
                background: rgba(145, 117, 109, 0.25);
                border-color: rgba(145, 117, 109, 0.5);
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(145, 117, 109, 0.2);
            }
            
            .light-nav-btn:active {
                transform: translateY(0);
            }
            
            .light-nav-btn:disabled {
                opacity: 0.5;
                cursor: not-allowed;
                transform: none;
            }
            
            .light-dots {
                display: flex;
                justify-content: center;
                gap: clamp(8px, 2vw, 10px);
                margin-top: clamp(25px, 4vh, 30px);
            }
            
            .light-dot {
                width: clamp(10px, 2vw, 12px);
                height: clamp(10px, 2vw, 12px);
                border-radius: 50%;
                background: rgba(145, 117, 109, 0.3);
                cursor: pointer;
                transition: all 0.3s ease;
                border: 2px solid transparent;
            }
            
            .light-dot:hover {
                background: rgba(145, 117, 109, 0.5);
            }
            
            .light-dot.active {
                background: #91756D;
                transform: scale(1.2);
                border-color: rgba(145, 117, 109, 0.3);
            }
            
            /* Tablet Portrait (768px - 1023px) */
            @media (min-width: 768px) and (max-width: 1023px) {
                .light-testimonial-card {
                    padding: 30px 28px;
                }
            }
            
            /* Mobile Landscape (576px - 767px) */
            @media (min-width: 576px) and (max-width: 767px) {
                .light-testimonial {
                    padding: 50px 18px;
                }
                
                .light-testimonial-card {
                    padding: 25px 22px;
                }
                
                .light-testimonial-author {
                    flex-direction: row;
                    text-align: left;
                }
            }
            
            /* Mobile Portrait (up to 575px) */
            @media (max-width: 575px) {
                .light-testimonial {
                    padding: 45px 15px;
                }
                
                .light-testimonial h2 {
                    margin-bottom: 35px;
                }
                
                .light-testimonial-card {
                    padding: 25px 20px;
                    margin-bottom: 20px;
                }
                
                .light-testimonial-message {
                    margin-bottom: 20px;
                    line-height: 1.6;
                }
                
                .light-testimonial-author {
                    gap: 12px;
                }
                
                .light-author-info h4 {
                    font-size: 1rem;
                }
                
                .light-author-role {
                    font-size: 0.85rem;
                }
                
                .light-nav-btn {
                    padding: 10px 18px;
                    min-width: 90px;
                }
            }
            
            /* Extra Small Mobile (up to 375px) */
            @media (max-width: 375px) {
                .light-testimonial {
                    padding: 40px 12px;
                }
                
                .light-testimonial h2 {
                    margin-bottom: 30px;
                }
                
                .light-testimonial-card {
                    padding: 20px 15px;
                }
                
                .light-testimonial-author {
                    gap: 10px;
                }
                
                .light-author-avatar {
                    width: 40px;
                    height: 40px;
                    min-width: 40px;
                }
            }
            
            /* Touch device improvements */
            @media (hover: none) and (pointer: coarse) {
                .light-testimonial-card:hover {
                    transform: translateY(0);
                    box-shadow: 0 8px 25px rgba(145, 117, 109, 0.2);
                }
                
                .light-testimonial-card:active {
                    transform: scale(0.99);
                }
                
                .light-nav-btn:hover {
                    transform: none;
                    background: rgba(145, 117, 109, 0.15);
                    box-shadow: none;
                }
                
                .light-nav-btn:active {
                    transform: scale(0.96);
                    background: rgba(145, 117, 109, 0.25);
                }
                
                .light-dot:hover {
                    background: rgba(145, 117, 109, 0.3);
                }
                
                .light-dot:active {
                    transform: scale(0.9);
                }
            }
            
            /* Landscape orientation on mobile */
            @media (orientation: landscape) and (max-height: 500px) {
                .light-testimonial {
                    padding: 35px 15px;
                }
                
                .light-testimonial h2 {
                    font-size: 2rem;
                    margin-bottom: 25px;
                }
                
                .light-testimonial-card {
                    padding: 20px 25px;
                    margin-bottom: 20px;
                }
                
                .light-testimonial-message {
                    font-size: 0.95rem;
                    line-height: 1.5;
                    margin-bottom: 15px;
                }
                
                .light-dots {
                    margin-top: 20px;
                }
            }
            
            /* Print styles */
            @media print {
                .light-testimonial::before {
                    display: none;
                }
                
                .light-testimonial-card {
                    break-inside: avoid;
                    page-break-inside: avoid;
                    box-shadow: none;
                    border: 1px solid #ddd;
                }
                
                .light-nav-btn,
                .light-dots {
                    display: none;
                }
            }
            
            /* High contrast mode */
            @media (prefers-contrast: high) {
                .light-testimonial-card {
                    border: 2px solid #91756D;
                }
                
                .light-dot {
                    border: 2px solid #91756D;
                }
            }
            
            /* Reduced motion */
            @media (prefers-reduced-motion: reduce) {
                .light-testimonial::before,
                .light-testimonial h2,
                .light-testimonial-card,
                .light-nav-btn,
                .light-dot {
                    animation: none;
                    transition: none;
                }
                
                .light-testimonial-card:hover,
                .light-nav-btn:hover {
                    transform: none;
                }
            }
            
            /* Wide screen optimization */
            @media (min-width: 1200px) {
                .light-testimonial-content {
                    max-width: 1000px;
                }
            }
            
            /* Swipe indicator for mobile */
            @media (max-width: 767px) {
                .light-testimonial-card::after {
                    content: '← Swipe →';
                    display: block;
                    text-align: center;
                    font-size: 0.75rem;
                    color: #91756D;
                    opacity: 0.4;
                    margin-top: 15px;
                    font-weight: 500;
                }
            }
        </style>
        
        <div class="light-testimonial">
            <div class="light-testimonial-content">
                <h2><?php echo htmlspecialchars($this->title); ?></h2>
                
                <div id="lightTestimonialContainer">
                    <?php foreach ($this->testimonials as $index => $testimonial): ?>
                        <div class="light-testimonial-card <?php echo $index === 0 ? 'active' : ''; ?>" 
                             style="<?php echo $index !== 0 ? 'display: none;' : ''; ?>" 
                             data-index="<?php echo $index; ?>"
                             role="article"
                             aria-label="Testimonial from <?php echo htmlspecialchars($testimonial['name']); ?>">
                            
                            <div class="light-quote-icon" aria-hidden="true">"</div>
                            
                            <div class="light-testimonial-message">
                                <?php echo htmlspecialchars($testimonial['message']); ?>
                            </div>
                            
                            <div class="light-testimonial-author">
                                <div class="light-author-avatar" aria-hidden="true">
                                    <?php echo strtoupper(substr($testimonial['name'], 0, 1)); ?>
                                </div>
                                <div class="light-author-info">
                                    <h4><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                                    <p class="light-author-role"><?php echo htmlspecialchars($testimonial['role']); ?> at <?php echo htmlspecialchars($testimonial['company']); ?></p>
                                    
                                    <div class="light-rating" role="img" aria-label="<?php echo $testimonial['rating']; ?> out of 5 stars">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <span class="light-star" aria-hidden="true"><?php echo $i < $testimonial['rating'] ? '★' : '☆'; ?></span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <?php if (count($this->testimonials) > 1): ?>
                <div class="light-dots" role="tablist" aria-label="Testimonial navigation">
                    <?php for ($i = 0; $i < count($this->testimonials); $i++): ?>
                        <div class="light-dot <?php echo $i === 0 ? 'active' : ''; ?>" 
                             onclick="lightGoToTestimonial(<?php echo $i; ?>)"
                             role="tab"
                             aria-label="Go to testimonial <?php echo $i + 1; ?>"
                             aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                             tabindex="0"></div>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <script>
            let lightCurrentTestimonial = 0;
            const lightTotalTestimonials = <?php echo count($this->testimonials); ?>;
            let lightAutoAdvanceInterval = null;
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            
            function lightShowTestimonial(direction) {
                const cards = document.querySelectorAll('#lightTestimonialContainer .light-testimonial-card');
                const dots = document.querySelectorAll('.light-dot');
                
                // Hide current card with animation
                cards[lightCurrentTestimonial].classList.remove('active');
                dots[lightCurrentTestimonial].classList.remove('active');
                dots[lightCurrentTestimonial].setAttribute('aria-selected', 'false');
                
                const animationDelay = prefersReducedMotion ? 0 : 250;
                
                setTimeout(() => {
                    cards[lightCurrentTestimonial].style.display = 'none';
                    
                    lightCurrentTestimonial += direction;
                    if (lightCurrentTestimonial >= lightTotalTestimonials) lightCurrentTestimonial = 0;
                    if (lightCurrentTestimonial < 0) lightCurrentTestimonial = lightTotalTestimonials - 1;
                    
                    // Show new card with animation
                    cards[lightCurrentTestimonial].style.display = 'block';
                    dots[lightCurrentTestimonial].classList.add('active');
                    dots[lightCurrentTestimonial].setAttribute('aria-selected', 'true');
                    
                    setTimeout(() => {
                        cards[lightCurrentTestimonial].classList.add('active');
                    }, prefersReducedMotion ? 0 : 50);
                }, animationDelay);
            }
            
            function lightGoToTestimonial(index) {
                if (index === lightCurrentTestimonial) return;
                
                const cards = document.querySelectorAll('#lightTestimonialContainer .light-testimonial-card');
                const dots = document.querySelectorAll('.light-dot');
                
                // Hide current card
                cards[lightCurrentTestimonial].classList.remove('active');
                dots[lightCurrentTestimonial].classList.remove('active');
                dots[lightCurrentTestimonial].setAttribute('aria-selected', 'false');
                
                const animationDelay = prefersReducedMotion ? 0 : 200;
                
                setTimeout(() => {
                    cards[lightCurrentTestimonial].style.display = 'none';
                    lightCurrentTestimonial = index;
                    
                    // Show new card
                    cards[lightCurrentTestimonial].style.display = 'block';
                    dots[lightCurrentTestimonial].classList.add('active');
                    dots[lightCurrentTestimonial].setAttribute('aria-selected', 'true');
                    
                    setTimeout(() => {
                        cards[lightCurrentTestimonial].classList.add('active');
                    }, prefersReducedMotion ? 0 : 50);
                }, animationDelay);
                
                // Reset auto-advance
                lightResetAutoAdvance();
            }
            
            // Auto-advance testimonials every 6 seconds
            function lightStartAutoAdvance() {
                if (!prefersReducedMotion && lightTotalTestimonials > 1) {
                    lightAutoAdvanceInterval = setInterval(() => {
                        lightShowTestimonial(1);
                    }, 6000);
                }
            }
            
            function lightResetAutoAdvance() {
                if (lightAutoAdvanceInterval) {
                    clearInterval(lightAutoAdvanceInterval);
                    lightStartAutoAdvance();
                }
            }
            
            // Keyboard navigation for dots
            document.querySelectorAll('.light-dot').forEach((dot, index) => {
                dot.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        lightGoToTestimonial(index);
                    }
                });
            });
            
            // Touch swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;
            
            const container = document.getElementById('lightTestimonialContainer');
            
            container.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });
            
            container.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, { passive: true });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        // Swipe left - next
                        lightShowTestimonial(1);
                    } else {
                        // Swipe right - previous
                        lightShowTestimonial(-1);
                    }
                    lightResetAutoAdvance();
                }
            }
            
            // Pause auto-advance on hover/focus (desktop)
            if (window.matchMedia('(hover: hover)').matches) {
                const testimonialSection = document.querySelector('.light-testimonial');
                testimonialSection.addEventListener('mouseenter', () => {
                    if (lightAutoAdvanceInterval) {
                        clearInterval(lightAutoAdvanceInterval);
                    }
                });
                
                testimonialSection.addEventListener('mouseleave', () => {
                    lightStartAutoAdvance();
                });
            }
            
            // Start auto-advance
            lightStartAutoAdvance();
        </script>
        <?php
        return ob_get_clean();
    }
}


// Example usage - Beautiful Testimonial component
$lightTestimonials = new LightTestimonialComponent("What Our Clients Say");
$lightTestimonials
    ->addTestimonial(
        "Sony P.",
        "Direktur Utama",
        "PT Maju Bersama",
        "Bekerja sama dengan tim ini benar-benar memberikan dampak besar bagi bisnis kami. Mulai dari pemahaman kebutuhan hingga eksekusi, semuanya dilakukan dengan sangat profesional. Hasilnya melampaui ekspektasi kami.",
        5
    )
    ->addTestimonial(
        "Kelvin N.",
        "Head of Marketing",
        "Nusantara Digital",
        "Kami sudah bekerja dengan banyak mitra sebelumnya, namun tim ini memiliki keunggulan dalam strategi dan ketepatan eksekusi. Mereka memahami target pasar kami dan mampu memberikan hasil yang nyata dan terukur.",
        5
    )
    ->addTestimonial(
        "Herman C.",
        "Owner",
        "Creative Works Indonesia",
        "Kreativitas dan keahlian teknis yang mereka tawarkan sangat luar biasa. Sejak bekerja sama, performa brand kami meningkat signifikan dan respon pasar jauh lebih positif. Sangat direkomendasikan.",
        5
    )
    ->addTestimonial(
        "Lani",
        "Manajer Operasional",
        "Sentra Logistik",
        "Sejak awal, tim ini menunjukkan pemahaman yang mendalam terhadap tantangan operasional kami. Solusi yang diberikan tidak hanya efektif, tetapi juga efisien dan berkelanjutan. Komunikasi selama proyek juga sangat baik.",
        4
    )
    ->addTestimonial(
        "Yakoob S.",
        "Product Lead",
        "Inovasi Teknologi",
        "Pendekatan strategis dan komitmen mereka terhadap kualitas benar-benar terasa. Kami melihat peningkatan signifikan pada keterlibatan pengguna dan performa produk. Mereka bukan sekadar vendor, tetapi mitra jangka panjang.",
        5
    );

echo $lightTestimonials->render();
?>