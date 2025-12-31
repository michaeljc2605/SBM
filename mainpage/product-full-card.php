<?php
// Products data - you can move this to a separate config file or database
$products = [
    [
        'type' => 'B TYPE',
        'title' => 'B Flute Corrugated',
        'description' => 'Single wall corrugated boxes perfect for lightweight packaging needs. Ideal for shipping documents, small electronics, and retail products.',
        'features' => ['Lightweight', 'Cost-effective', 'Versatile'],
        'image' => 'static/b-flute-cardboard.jpg'
    ],
    [
        'type' => 'C TYPE',
        'title' => 'C Flute Corrugated',
        'description' => 'Medium wall corrugated boxes offering enhanced protection and durability. Perfect for medium-weight products and general shipping.',
        'features' => ['Durable', 'Medium-weight', 'Reliable'],
        'image' => 'static/c-flute-cardboard.jpg'
    ],
    [
        'type' => 'B&C TYPE',
        'title' => 'B&C Flute Corrugated',
        'description' => 'Double wall corrugated boxes combining B and C flute for superior strength. Excellent for heavy-duty applications and fragile items.',
        'features' => ['Double Wall', 'Heavy-duty', 'Premium Protection'],
        'image' => 'static/b&c-flute-cardboard.jpg'
    ],
    [
        'type' => 'E TYPE',
        'title' => 'E Flute Corrugated',
        'description' => 'Micro flute corrugated boxes with excellent printability and smooth surface. Perfect for retail packaging and high-quality printing applications.',
        'features' => ['Micro Flute', 'Print-friendly', 'Smooth Finish'],
        'image' => 'static/e-flute-cardboard.jpg'
    ]
];
?>

<style>
/* Base Styles */
.products-section {
    padding: clamp(40px, 8vh, 60px) 0;
    background: #f8f9fa;
    border-top: 3px solid #91756D;
}

.products-title {
    color: #91756D;
    font-weight: 700;
    font-size: clamp(1.8rem, 5vw, 2.5rem);
    margin-bottom: clamp(12px, 2vh, 15px);
    text-align: center;
    line-height: 1.2;
    padding: 0 15px;
}

.products-subtitle {
    color: #6c757d;
    font-size: clamp(0.95rem, 2.5vw, 1.1rem);
    text-align: center;
    max-width: min(600px, 90%);
    margin: 0 auto clamp(30px, 5vh, 40px);
    padding: 0 20px;
    line-height: 1.6;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(300px, 100%), 1fr));
    gap: clamp(20px, 4vw, 30px);
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 clamp(15px, 3vw, 20px);
}

.product-card {
    background: white;
    border-radius: clamp(12px, 2vw, 15px);
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.product-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 60%; /* 5:3 aspect ratio */
    overflow: hidden;
    background: #e9ecef;
}

.product-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-badge {
    position: absolute;
    top: clamp(10px, 2vw, 15px);
    left: clamp(10px, 2vw, 15px);
    background: #91756D;
    color: white;
    padding: clamp(5px, 1vw, 6px) clamp(10px, 2vw, 12px);
    border-radius: clamp(10px, 2vw, 12px);
    font-size: clamp(0.7rem, 1.8vw, 0.8rem);
    font-weight: 600;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.product-content {
    padding: clamp(20px, 4vw, 25px);
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.product-title {
    color: #91756D;
    font-weight: 600;
    font-size: clamp(1.1rem, 3vw, 1.3rem);
    margin-bottom: clamp(10px, 2vh, 12px);
    line-height: 1.3;
}

.product-description {
    color: #6c757d;
    font-size: clamp(0.85rem, 2vw, 0.9rem);
    line-height: 1.6;
    margin-bottom: clamp(12px, 2vh, 15px);
    flex-grow: 1;
}

.product-features {
    margin-bottom: clamp(15px, 3vh, 20px);
    display: flex;
    flex-wrap: wrap;
    gap: clamp(4px, 1vw, 6px);
}

.feature-tag {
    display: inline-block;
    background: #e9ecef;
    color: #91756D;
    padding: clamp(4px, 1vw, 5px) clamp(8px, 2vw, 10px);
    border-radius: clamp(8px, 1.5vw, 10px);
    font-size: clamp(0.7rem, 1.8vw, 0.75rem);
    font-weight: 500;
    white-space: nowrap;
}

.product-btn {
    background: #91756D;
    color: white;
    border: none;
    padding: clamp(10px, 2vh, 12px) clamp(18px, 4vw, 20px);
    border-radius: 25px;
    font-size: clamp(0.85rem, 2vw, 0.9rem);
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    min-height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-btn:hover {
    background: #A68B7A;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(145, 117, 109, 0.3);
}

/* Tablet Landscape (1024px - 1199px) */
@media (min-width: 1024px) and (max-width: 1199px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Tablet Portrait (768px - 1023px) */
@media (min-width: 768px) and (max-width: 1023px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
    
    .product-image-wrapper {
        padding-top: 65%;
    }
}

/* Mobile Landscape (576px - 767px) */
@media (min-width: 576px) and (max-width: 767px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        padding: 0 15px;
    }
    
    .product-content {
        padding: 18px;
    }
    
    .product-description {
        font-size: 0.8rem;
    }
    
    .feature-tag {
        font-size: 0.65rem;
        padding: 3px 7px;
    }
}

/* Mobile Portrait (up to 575px) */
@media (max-width: 575px) {
    .products-section {
        padding: 35px 0;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        padding: 0 15px;
    }
    
    .product-card {
        max-width: 500px;
        margin: 0 auto;
        width: 100%;
    }
    
    .product-content {
        padding: 20px;
    }
    
    .product-image-wrapper {
        padding-top: 60%;
    }
}

/* Extra Small Mobile (up to 375px) */
@media (max-width: 375px) {
    .products-section {
        padding: 30px 0;
    }
    
    .products-grid {
        padding: 0 12px;
        gap: 15px;
    }
    
    .product-content {
        padding: 18px;
    }
    
    .product-badge {
        font-size: 0.65rem;
        padding: 4px 8px;
    }
    
    .feature-tag {
        font-size: 0.65rem;
        padding: 3px 7px;
    }
}

/* Touch device improvements */
@media (hover: none) and (pointer: coarse) {
    .product-card:hover {
        transform: none;
    }
    
    .product-card:active {
        transform: scale(0.98);
    }
    
    .product-btn {
        min-height: 48px;
    }
    
    .product-btn:active {
        transform: scale(0.98);
        background: #A68B7A;
    }
}

/* Landscape orientation on mobile */
@media (orientation: landscape) and (max-height: 500px) {
    .products-section {
        padding: 30px 0;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }
    
    .product-image-wrapper {
        padding-top: 50%;
    }
}

/* High DPI screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .product-image {
        image-rendering: -webkit-optimize-contrast;
    }
}

/* Grid optimization for exactly 2 or 3 items visible */
@media (min-width: 768px) and (max-width: 1023px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .products-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }
}

/* Print styles */
@media print {
    .products-section {
        padding: 20px 0;
    }
    
    .product-card {
        break-inside: avoid;
        box-shadow: none;
        border: 1px solid #ddd;
    }
    
    .product-btn {
        display: none;
    }
}
</style>

<!-- Products Showcase Section -->
<section class="products-section">
    <div class="container">
        <h2 class="products-title">Our Premium Cartons</h2>
        <p class="products-subtitle">Discover our comprehensive range of high-quality corrugated packaging solutions designed to meet your business needs</p>

        <?php
        function anchorId($type) {
            return strtolower(str_replace([' ', '&'], ['-', 'and'], $type));
        }
        ?>
        
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                             alt="<?php echo htmlspecialchars($product['title']); ?>" 
                             class="product-image"
                             loading="lazy">
                        <div class="product-badge"><?php echo htmlspecialchars($product['type']); ?></div>
                    </div>
                    
                    <div class="product-content">
                        <h3 class="product-title"><?php echo htmlspecialchars($product['title']); ?></h3>
                        <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                        
                        <div class="product-features">
                            <?php foreach ($product['features'] as $feature): ?>
                                <span class="feature-tag"><?php echo htmlspecialchars($feature); ?></span>
                            <?php endforeach; ?>
                        </div>
                        
                        <a 
                            href="Cartons.php#<?php echo anchorId($product['type']); ?>" 
                            class="product-btn"
                        >
                            Learn More
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
// Smooth scroll to anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && href.includes('#')) {
            e.preventDefault();
            const target = document.querySelector(href.split('#')[1] ? '#' + href.split('#')[1] : href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});

// Optional: Add lazy loading intersection observer for better performance
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('.product-image[loading="lazy"]').forEach(img => {
        imageObserver.observe(img);
    });
}
</script>