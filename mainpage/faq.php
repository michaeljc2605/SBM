<?php
class FAQComponent {
    private $title;
    private $subtitle;
    private $faqs;
    
    public function __construct($title = "Frequently Asked Questions", $subtitle = "Find answers to common questions") {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->faqs = [];
    }
    
    public function addFAQ($question, $answer) {
        $this->faqs[] = [
            'question' => $question,
            'answer' => $answer,
            'id' => 'faq_' . count($this->faqs)
        ];
        return $this;
    }
    
    public function render() {
        ob_start();
        ?>
        <style>
            .faq-container {
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                padding: 80px 20px;
                font-family: 'Arial', sans-serif;
                position: relative;
            }
            
            .faq-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: 
                    radial-gradient(circle at 20% 20%, rgba(120, 119, 198, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(255, 119, 198, 0.1) 0%, transparent 50%);
                pointer-events: none;
            }
            
            .faq-content {
                max-width: 800px;
                margin: 0 auto;
                position: relative;
                z-index: 1;
            }
            
            .faq-header {
                text-align: center;
                margin-bottom: 60px;
            }
            
            .faq-header h2 {
                font-size: 3rem;
                font-weight: 700;
                color: #2c3e50;
                margin-bottom: 16px;
                text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            
            .faq-header p {
                font-size: 1.25rem;
                color: #5a6c7d;
                margin-bottom: 0;
            }
            
            .faq-list {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
            
            .faq-item {
                background: white;
                border-radius: 15px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                transition: all 0.3s ease;
                border: 1px solid rgba(0, 0, 0, 0.05);
            }
            
            .faq-item:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }
            
            .faq-question {
                padding: 25px 30px;
                cursor: pointer;
                display: flex;
                justify-content: space-between;
                align-items: center;
                background: white;
                transition: all 0.3s ease;
                border: none;
                width: 100%;
                text-align: left;
                font-size: 1.1rem;
                font-weight: 600;
                color: #2c3e50;
            }
            
            .faq-question:hover {
                background: #f8f9fa;
            }
            
            .faq-question.active {
                background: linear-gradient(135deg, #91756D, #A68B7A);;
                color: white;
            }
            
            .faq-icon {
                font-size: 1.5rem;
                transition: transform 0.3s ease;
                color: #667eea;
                font-weight: bold;
            }
            
            .faq-question.active .faq-icon {
                transform: rotate(45deg);
                color: white;
            }
            
            .faq-answer {
                max-height: 0;
                overflow: hidden;
                transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                background: #f8f9fa;
            }
            
            .faq-answer.active {
                max-height: 300px;
                padding: 25px 30px;
            }
            
            .faq-answer-content {
                color: #5a6c7d;
                line-height: 1.7;
                font-size: 1rem;
            }
            
            .faq-stats {
                display: flex;
                justify-content: center;
                gap: 40px;
                margin-top: 60px;
                padding-top: 40px;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }
            
            .faq-stat {
                text-align: center;
            }
            
            .faq-stat-number {
                font-size: 2.5rem;
                font-weight: 700;
                color: #91756D;
                display: block;
            }
            
            .faq-stat-label {
                font-size: 0.9rem;
                color: #5a6c7d;
                text-transform: uppercase;
                letter-spacing: 1px;
            }
            
            @media (max-width: 768px) {
                .faq-container {
                    padding: 60px 15px;
                }
                
                .faq-header h2 {
                    font-size: 2.5rem;
                }
                
                .faq-question, .faq-answer.active {
                    padding: 20px 20px;
                }
                
                .faq-question {
                    font-size: 1rem;
                }
                
                .faq-stats {
                    flex-direction: column;
                    gap: 20px;
                }
                
                .faq-stat-number {
                    font-size: 2rem;
                }
            }
        </style>
        
        <div class="faq-container">
            <div class="faq-content">
                <div class="faq-header">
                    <h2><?php echo htmlspecialchars($this->title); ?></h2>
                    <p><?php echo htmlspecialchars($this->subtitle); ?></p>
                </div>
                
                <div class="faq-list">
                    <?php foreach ($this->faqs as $index => $faq): ?>
                        <div class="faq-item">
                            <button class="faq-question" data-target="<?php echo $faq['id']; ?>">
                                <span><?php echo htmlspecialchars($faq['question']); ?></span>
                                <span class="faq-icon">+</span>
                            </button>
                            <div class="faq-answer" id="<?php echo $faq['id']; ?>">
                                <div class="faq-answer-content">
                                    <?php echo nl2br(htmlspecialchars($faq['answer'])); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="faq-stats">
                    <div class="faq-stat">
                        <span class="faq-stat-number"><?php echo count($this->faqs); ?></span>
                        <span class="faq-stat-label">Questions Answered</span>
                    </div>
                    <div class="faq-stat">
                        <span class="faq-stat-number">24/7</span>
                        <span class="faq-stat-label">Support Available</span>
                    </div>
                    <div class="faq-stat">
                        <span class="faq-stat-number">98%</span>
                        <span class="faq-stat-label">Satisfaction Rate</span>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const faqQuestions = document.querySelectorAll('.faq-question');
                
                faqQuestions.forEach(question => {
                    question.addEventListener('click', function() {
                        const targetId = this.dataset.target;
                        const answer = document.getElementById(targetId);
                        const isActive = this.classList.contains('active');
                        
                        // Close all other FAQ items
                        faqQuestions.forEach(q => {
                            q.classList.remove('active');
                            const otherId = q.dataset.target;
                            const otherAnswer = document.getElementById(otherId);
                            otherAnswer.classList.remove('active');
                        });
                        
                        // Toggle current item
                        if (!isActive) {
                            this.classList.add('active');
                            answer.classList.add('active');
                        }
                    });
                });
                
                // Auto-open first FAQ item
                if (faqQuestions.length > 0) {
                    faqQuestions[0].click();
                }
            });
        </script>
        <?php
        return ob_get_clean();
    }
}

// Example usage:
$faq = new FAQComponent("Frequently Asked Questions", "Everything you need to know about our services");

$faq->addFAQ(
    "What services do you offer?",
    "We offer a comprehensive range of digital services including web development, mobile app development, UI/UX design, digital marketing, and cloud solutions. Our team specializes in creating custom solutions tailored to your business needs."
)->addFAQ(
    "How long does a typical project take?",
    "Project timelines vary depending on scope and complexity. A simple website typically takes 2-4 weeks, while more complex applications can take 2-6 months. We provide detailed timelines during our initial consultation and keep you updated throughout the development process."
)->addFAQ(
    "What is your pricing structure?",
    "Our pricing is project-based and depends on your specific requirements. We offer competitive rates with transparent pricing - no hidden fees. After understanding your needs, we provide a detailed quote with clear milestones and payment terms."
)->addFAQ(
    "Do you provide ongoing support and maintenance?",
    "Yes! We offer comprehensive support and maintenance packages to ensure your solution continues to perform optimally. This includes regular updates, security patches, performance monitoring, and technical support. We're here to help your business grow."
)->addFAQ(
    "Can you work with our existing systems?",
    "Absolutely! We have extensive experience integrating with existing systems and platforms. Whether you're using CRM software, e-commerce platforms, or custom databases, we can seamlessly connect new solutions with your current infrastructure."
)->addFAQ(
    "What makes you different from other agencies?",
    "Our focus on long-term partnerships, transparent communication, and results-driven approach sets us apart. We don't just deliver projects - we become invested in your success. Our team combines technical expertise with business understanding to deliver solutions that truly impact your bottom line."
);

// Render the component
echo $faq->render();
?>