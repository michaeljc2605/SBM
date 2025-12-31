<?php
class CTAComponent {
    private $title;
    private $subtitle;
    private $buttonText;
    private $buttonLink;
    private $image;
    private $imageAlt;
    private $layout; // 'left' or 'right' for image position
    private $showPlaceholder;
    
    public function __construct(
        $title = "Ready to Transform Your Business?", 
        $subtitle = "Join thousands of satisfied customers who have taken their business to the next level with our innovative solutions.",
        $buttonText = "Contact Us Today",
        $buttonLink = "contactUs.php",
        $layout = "right"
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->buttonText = $buttonText;
        $this->buttonLink = $buttonLink;
        $this->layout = $layout;
        $this->image = null;
        $this->imageAlt = "Business transformation";
        $this->showPlaceholder = true;
    }
    
    public function setImage($imagePath, $altText = "CTA Image") {
        // Check if image file exists
        if (file_exists($imagePath)) {
            $this->image = $imagePath;
            $this->imageAlt = $altText;
            $this->showPlaceholder = false;
        } else {
            // Log warning or handle missing image
            error_log("CTA Component: Image not found at path: " . $imagePath);
            $this->image = null;
            $this->showPlaceholder = true;
        }
        return $this;
    }
    
    public function setImageUrl($imageUrl, $altText = "CTA Image") {
        // For external URLs, we'll trust they exist
        $this->image = $imageUrl;
        $this->imageAlt = $altText;
        $this->showPlaceholder = false;
        return $this;
    }
    
    public function setLayout($layout) {
        $this->layout = $layout; // 'left' or 'right'
        return $this;
    }
    
    public function hidePlaceholder() {
        $this->showPlaceholder = false;
        return $this;
    }
    
    public function showPlaceholder() {
        $this->showPlaceholder = true;
        return $this;
    }
    
    private function getImageMimeType($imagePath) {
        if (!file_exists($imagePath)) return false;
        $imageInfo = getimagesize($imagePath);
        return $imageInfo ? $imageInfo['mime'] : false;
    }
    
    public function render() {
        $imageOrder = $this->layout === 'left' ? '1' : '2';
        $contentOrder = $this->layout === 'left' ? '2' : '1';
        
        ob_start();
        ?>
        <style>
            .cta-container {
                background: linear-gradient(135deg, #91756D, #A68B7A);
                padding: 100px 20px;
                margin: 0;
                position: relative;
                overflow: hidden;
                font-family: 'Arial', sans-serif;
            }
            
            .cta-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: 
                    radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.2) 0%, transparent 50%);
                animation: float 8s ease-in-out infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(2deg); }
            }
            
            .cta-content {
                max-width: 1200px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 60px;
                align-items: center;
                position: relative;
                z-index: 2;
            }
            
            .cta-text {
                color: white;
                order: <?php echo $contentOrder; ?>;
            }
            
            .cta-text h2 {
                font-size: 3.5rem;
                font-weight: 700;
                margin-bottom: 24px;
                line-height: 1.1;
                text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            }
            
            .cta-text p {
                font-size: 1.4rem;
                line-height: 1.6;
                margin-bottom: 40px;
                opacity: 0.95;
                text-shadow: 0 1px 2px rgba(0,0,0,0.2);
            }
            
            .cta-button {
                display: inline-flex;
                margin-top: 20px;
                align-items: center;
                gap: 12px;
                background: white;
                color: #91756D;
                padding: 18px 36px;
                border-radius: 50px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1.2rem;
                transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                border: 3px solid transparent;
                position: relative;
                overflow: hidden;
            }
            
            .cta-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
                transition: left 0.5s;
            }
            
            .cta-button:hover::before {
                left: 100%;
            }
            
            .cta-button:hover {
                transform: translateY(-3px) scale(1.05);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
                border-color: rgba(255, 255, 255, 0.3);
            }
            
            .cta-button:active {
                transform: translateY(-1px) scale(1.02);
            }
            
            .button-icon {
                font-size: 1.3rem;
                transition: transform 0.3s ease;
            }
            
            .cta-button:hover .button-icon {
                transform: translateX(5px);
            }
            
            .cta-image {
                order: <?php echo $imageOrder; ?>;
                position: relative;
            }
            
            .cta-image-wrapper {
                position: relative;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                transform: perspective(1000px) rotateY(<?php echo $this->layout === 'left' ? '10deg' : '-10deg'; ?>);
                transition: transform 0.3s ease;
            }
            
            .cta-image-wrapper:hover {
                transform: perspective(1000px) rotateY(0deg) scale(1.02);
            }
            
            .cta-image-wrapper::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(145, 117, 109, 0.2), rgba(166, 139, 122, 0.2));
                z-index: 1;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            
            .cta-image-wrapper:hover::before {
                opacity: 1;
            }
            
            .cta-image img {
                width: 100%;
                height: 400px;
                object-fit: cover;
                display: block;
                transition: transform 0.3s ease;
            }
            
            .cta-image img:hover {
                transform: scale(1.05);
            }
            
            .cta-placeholder {
                width: 100%;
                height: 400px;
                background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.3) 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 4rem;
                color: rgba(255,255,255,0.7);
                border-radius: 20px;
                border: 2px dashed rgba(255,255,255,0.3);
                flex-direction: column;
                gap: 10px;
            }
            
            .placeholder-text {
                font-size: 1.2rem;
                text-align: center;
                opacity: 0.8;
            }
            
            .cta-features {
                display: flex;
                gap: 30px;
                margin-top: 30px;
                flex-wrap: wrap;
            }
            
            .cta-feature {
                display: flex;
                align-items: center;
                gap: 10px;
                color: white;
                font-size: 1rem;
                opacity: 0.9;
            }
            
            .feature-icon {
                color: #FFD700;
                font-size: 1.2rem;
            }
            
            @media (max-width: 968px) {
                .cta-content {
                    grid-template-columns: 1fr;
                    gap: 40px;
                    text-align: center;
                }
                
                .cta-text, .cta-image {
                    order: unset;
                }
                
                .cta-image-wrapper {
                    transform: none;
                }
                
                .cta-text h2 {
                    font-size: 3rem;
                }
                
                .cta-features {
                    justify-content: center;
                }
            }
            
            @media (max-width: 768px) {
                .cta-container {
                    padding: 80px 15px;
                }
                
                .cta-text h2 {
                    font-size: 2.5rem;
                }
                
                .cta-text p {
                    font-size: 1.2rem;
                }
                
                .cta-button {
                    padding: 16px 30px;
                    font-size: 1.1rem;
                }
                
                .cta-image img, .cta-placeholder {
                    height: 300px;
                }
                
                .cta-features {
                    flex-direction: column;
                    align-items: center;
                    gap: 15px;
                }
            }
            
            .image-error {
                background: rgba(255, 99, 99, 0.1);
                border: 2px dashed rgba(255, 99, 99, 0.5);
                color: rgba(255, 99, 99, 0.8);
            }
        </style>
        
        <div class="cta-container">
            <div class="cta-content">
                <div class="cta-text">
                    <h2><?php echo htmlspecialchars($this->title); ?></h2>
                    <p><?php echo htmlspecialchars($this->subtitle); ?></p>
                    
                    <div class="cta-features">
                        <div class="cta-feature">
                            <span class="feature-icon">✓</span>
                            <span>Free Consultation</span>
                        </div>
                        <div class="cta-feature">
                            <span class="feature-icon">✓</span>
                            <span>24/7 Support</span>
                        </div>
                        <div class="cta-feature">
                            <span class="feature-icon">✓</span>
                            <span>Money-Back Guarantee</span>
                        </div>
                    </div>
                    
                    <a href="<?php echo htmlspecialchars($this->buttonLink); ?>" class="cta-button">
                        <?php echo htmlspecialchars($this->buttonText); ?>
                        <span class="button-icon">→</span>
                    </a>
                </div>
                
                <div class="cta-image">
                    <div class="cta-image-wrapper">
                        <?php if ($this->image && !$this->showPlaceholder): ?>
                            <img src="<?php echo htmlspecialchars($this->image); ?>" 
                                 alt="<?php echo htmlspecialchars($this->imageAlt); ?>"
                                 onerror="this.parentElement.innerHTML='<div class=\'cta-placeholder image-error\'><span style=\'font-size: 3rem;\'>⚠️</span><div class=\'placeholder-text\'>Image not found</div></div>';">
                        <?php elseif ($this->showPlaceholder): ?>
                            <div class="cta-placeholder">
                                📞
                                <div class="placeholder-text">Add your image here</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}

// Example usage with different image scenarios:

// 1. Using a local image file
$cta1 = new CTAComponent(
    "Ready to Transform Your Business?",
    "Join thousands of satisfied customers who have taken their business to the next level with our innovative solutions.",
    "Get Started Now",
    "contactUs.php",
    "right"
);
$cta1->setImage("static/CTA-image.jpg", "Business transformation success");


// Render the component you want to use
echo $cta1->render();
?>