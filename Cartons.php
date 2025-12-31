<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Karton - Sumber Berlian Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f0ed 0%, #e8ddd8 100%);
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #B8A099 0%, #9d857c 50%, #8a6f65 100%);
            color: white;
            padding: clamp(80px, 15vh, 120px) 0 clamp(60px, 12vh, 100px);
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
            background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 0 clamp(15px, 4vw, 20px);
        }

        .hero-title {
            font-size: clamp(2rem, 6vw, 3.5rem);
            font-weight: 700;
            margin-bottom: clamp(15px, 3vh, 20px);
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-title i {
            font-size: clamp(1.8rem, 5.5vw, 3rem);
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            opacity: 0.95;
            max-width: min(800px, 90%);
            margin: 0 auto;
            line-height: 1.6;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Intro Section */
        .intro-section {
            padding: clamp(40px, 8vh, 50px) 0 clamp(25px, 5vh, 30px);
            background: white;
        }

        .intro-text {
            font-size: clamp(1rem, 2.5vw, 1.1rem);
            line-height: 1.7;
            color: #5a5a5a;
            text-align: center;
            max-width: min(900px, 90%);
            margin: 0 auto;
            padding: 0 clamp(15px, 4vw, 20px);
        }

        /* Flute Cards Section */
        .flutes-section {
            padding: clamp(30px, 6vh, 40px) 0;
        }

        .flute-card {
            background: white;
            border-radius: clamp(12px, 2vw, 15px);
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(184, 160, 153, 0.15);
            transition: all 0.4s ease;
            margin-bottom: clamp(25px, 5vh, 30px);
            display: flex;
            flex-direction: row;
        }

        .flute-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(184, 160, 153, 0.25);
        }

        .flute-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .flute-card:hover .flute-image {
            transform: scale(1.05);
        }

        .flute-image-container {
            overflow: hidden;
            position: relative;
            width: clamp(200px, 30vw, 280px);
            min-width: clamp(200px, 30vw, 280px);
            flex-shrink: 0;
        }

        .flute-badge {
            position: absolute;
            top: clamp(10px, 2vh, 15px);
            left: clamp(10px, 2vw, 15px);
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            color: white;
            padding: clamp(5px, 1vh, 6px) clamp(12px, 2.5vw, 16px);
            border-radius: 20px;
            font-weight: 600;
            font-size: clamp(0.75rem, 2vw, 0.85rem);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .flute-content {
            padding: clamp(20px, 4vw, 30px);
            flex: 1;
        }

        .flute-title {
            font-size: clamp(1.3rem, 3vw, 1.6rem);
            font-weight: 700;
            color: #B8A099;
            margin-bottom: clamp(12px, 2vh, 15px);
            display: flex;
            align-items: center;
            gap: clamp(8px, 2vw, 12px);
            line-height: 1.3;
        }

        .flute-icon {
            width: clamp(35px, 7vw, 40px);
            height: clamp(35px, 7vw, 40px);
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: clamp(0.9rem, 2vw, 1rem);
            flex-shrink: 0;
        }

        .section-subtitle {
            font-size: clamp(0.9rem, 2vw, 1rem);
            font-weight: 600;
            color: #947a70;
            margin-bottom: clamp(6px, 1vh, 8px);
            margin-top: clamp(12px, 2vh, 15px);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-subtitle i {
            color: #B8A099;
            font-size: clamp(0.8rem, 1.8vw, 0.9rem);
        }

        .characteristic-item, .advantage-item, .usage-item {
            padding: clamp(5px, 1vh, 6px) 0;
            color: #5a5a5a;
            line-height: 1.6;
            display: flex;
            align-items: start;
            gap: clamp(8px, 2vw, 10px);
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        .characteristic-item i, .advantage-item i, .usage-item i {
            color: #B8A099;
            margin-top: 4px;
            font-size: clamp(0.75rem, 1.8vw, 0.85rem);
            flex-shrink: 0;
        }

        /* Comparison Section */
        .comparison-section {
            padding: clamp(40px, 8vh, 50px) 0;
            background: white;
        }

        .comparison-title {
            text-align: center;
            font-size: clamp(1.8rem, 5vw, 2.2rem);
            font-weight: 700;
            color: #B8A099;
            margin-bottom: clamp(12px, 2vh, 15px);
            padding: 0 clamp(15px, 4vw, 20px);
            line-height: 1.2;
        }

        .comparison-subtitle {
            text-align: center;
            font-size: clamp(1rem, 2.5vw, 1.1rem);
            color: #5a5a5a;
            margin-bottom: clamp(30px, 5vh, 40px);
            padding: 0 clamp(15px, 4vw, 20px);
        }

        .comparison-table {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: clamp(15px, 3vw, 20px);
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(184, 160, 153, 0.15);
        }

        .comparison-table table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .comparison-table th {
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            color: white;
            padding: clamp(15px, 3vh, 20px);
            font-size: clamp(0.9rem, 2vw, 1rem);
            font-weight: 600;
            text-align: left;
            border: none;
        }

        .comparison-table td {
            padding: clamp(12px, 2.5vh, 16px) clamp(15px, 3vw, 20px);
            color: #5a5a5a;
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.3s ease;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            line-height: 1.5;
        }

        .comparison-table tr:hover td {
            background: #faf8f7;
        }

        .comparison-table tr:last-child td {
            border-bottom: none;
        }

        .table-icon {
            display: inline-block;
            width: clamp(28px, 6vw, 32px);
            height: clamp(28px, 6vw, 32px);
            background: linear-gradient(135deg, #B8A099 0%, #a68d84 100%);
            border-radius: 50%;
            text-align: center;
            line-height: clamp(28px, 6vw, 32px);
            color: white;
            margin-right: clamp(8px, 2vw, 10px);
            font-size: clamp(0.75rem, 1.8vw, 0.85rem);
            flex-shrink: 0;
        }

        /* Tablet Portrait (768px - 1023px) */
        @media (min-width: 768px) and (max-width: 1023px) {
            .flute-image-container {
                width: 250px;
                min-width: 250px;
            }

            .flute-content {
                padding: 25px;
            }
        }

        /* Mobile Landscape (576px - 767px) */
        @media (min-width: 576px) and (max-width: 767px) {
            .flute-card {
                flex-direction: column;
            }

            .flute-image-container {
                width: 100%;
                height: 220px;
                min-width: auto;
            }

            .flute-content {
                padding: 20px;
            }
        }

        /* Mobile Portrait (up to 575px) */
        @media (max-width: 575px) {
            .hero-section {
                padding: 70px 0 50px;
            }

            .flute-card {
                flex-direction: column;
                margin-bottom: 20px;
            }

            .flute-image-container {
                width: 100%;
                height: 200px;
                min-width: auto;
            }

            .flute-content {
                padding: 18px;
            }

            .flute-title {
                flex-wrap: wrap;
            }

            .comparison-table {
                margin: 0 15px;
                border-radius: 12px;
            }

            .comparison-table th,
            .comparison-table td {
                padding: 10px 12px;
            }

            .table-icon {
                display: block;
                margin: 0 0 8px 0;
            }
        }

        /* Extra Small Mobile (up to 375px) */
        @media (max-width: 375px) {
            .hero-section {
                padding: 60px 0 45px;
            }

            .flute-image-container {
                height: 180px;
            }

            .flute-content {
                padding: 15px;
            }

            .comparison-table {
                margin: 0 12px;
            }
        }

        /* Touch device improvements */
        @media (hover: none) and (pointer: coarse) {
            .flute-card:hover {
                transform: none;
                box-shadow: 0 10px 40px rgba(184, 160, 153, 0.15);
            }

            .flute-card:active {
                transform: scale(0.98);
            }

            .flute-card:hover .flute-image {
                transform: none;
            }

            .comparison-table tr:hover td {
                background: white;
            }
        }

        /* Landscape orientation on mobile */
        @media (orientation: landscape) and (max-height: 500px) {
            .hero-section {
                padding: 50px 0 40px;
            }

            .hero-title {
                font-size: 2rem;
                margin-bottom: 12px;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .flute-card {
                flex-direction: row;
            }

            .flute-image-container {
                width: 200px;
                min-width: 200px;
                height: auto;
            }

            .flute-content {
                padding: 15px;
            }
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .flute-card,
            .flute-image,
            .comparison-table td {
                transition: none;
            }

            .flute-card:hover {
                transform: none;
            }

            .flute-card:hover .flute-image {
                transform: none;
            }
        }

        /* Print styles */
        @media print {
            .hero-section {
                background: #B8A099 !important;
                padding: 30px 0;
            }

            .flute-card {
                break-inside: avoid;
                page-break-inside: avoid;
                box-shadow: none;
                border: 1px solid #ddd;
                margin-bottom: 20px;
            }

            .comparison-table {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }

        /* Container padding for all sections */
        .container {
            padding-left: clamp(15px, 4vw, 20px);
            padding-right: clamp(15px, 4vw, 20px);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Anchor offset for fixed navbar */
        [id] {
            scroll-margin-top: 80px;
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    <?php include("navbar.php"); ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <h1 class="hero-title">
                <i class="fas fa-box-open me-3"></i>
                Produk Karton Kami
            </h1>
            <p class="hero-subtitle">
                Kami menyediakan 4 jenis karton bergelombang (corrugated) dengan karakteristik dan keunggulan masing-masing. 
                Perbedaan utama terletak pada tinggi gelombang, ketebalan, dan kekuatan setiap jenis flute.
            </p>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="intro-section">
        <div class="container">
            <p class="intro-text">
                Setiap jenis karton dirancang untuk memenuhi kebutuhan spesifik dalam pengemasan, mulai dari tampilan visual yang menarik 
                hingga perlindungan maksimal untuk produk Anda. Pilih jenis karton yang tepat sesuai dengan kebutuhan bisnis Anda.
            </p>
        </div>
    </section>

    <!-- Flutes Section -->
    <section class="flutes-section">
        <div class="container">
            <!-- B Flute -->
            <div class="flute-card" id="b-type">
                <div class="flute-image-container">
                    <img src="static/b-flute-cardboard.jpg" alt="B Flute" class="flute-image">
                    <div class="flute-badge">B FLUTE</div>
                </div>
                <div class="flute-content">
                    <h2 class="flute-title">
                        <span class="flute-icon"><i class="fas fa-layer-group"></i></span>
                        B Flute
                    </h2>

                    <div class="section-subtitle">
                        <i class="fas fa-clipboard-list"></i>
                        Karakteristik
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Tinggi gelombang <strong>2,5 - 3 mm</strong></span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Gelombang rapat dengan jarak yang lebih dekat</span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Permukaan relatif halus dan rata</span>
                    </div>

                    <div class="section-subtitle">
                        <i class="fas fa-star"></i>
                        Kelebihan
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Lebih tipis dan ekonomis untuk biaya produksi</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Hasil cetakan lebih rapi dan detail</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Hemat tempat untuk penyimpanan dan pengiriman</span>
                    </div>

                    <div class="section-subtitle">
                        <i class="fas fa-boxes"></i>
                        Penggunaan Umum
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Outer box makanan (snack, frozen food, dll)</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Outer box sepatu dan fashion items</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Seluruh inner box untuk berbagai produk</span>
                    </div>
                </div>
            </div>

            <!-- C Flute -->
            <div class="flute-card" id="c-type">
                <div class="flute-image-container">
                    <img src="static/c-flute-cardboard.jpg" alt="C Flute" class="flute-image">
                    <div class="flute-badge">C FLUTE</div>
                </div>
                <div class="flute-content">
                    <h2 class="flute-title">
                        <span class="flute-icon"><i class="fas fa-shield-alt"></i></span>
                        C Flute
                    </h2>

                    <div class="section-subtitle">
                        <i class="fas fa-clipboard-list"></i>
                        Karakteristik
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Tinggi gelombang <strong>3,5 - 4 mm</strong></span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Gelombang lebih lebar dari B Flute</span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Fungsi utama untuk cushioning (penyangga)</span>
                    </div>

                    <div class="section-subtitle">
                        <i class="fas fa-star"></i>
                        Kelebihan
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tahan terhadap tekanan vertikal yang tinggi</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Bagus untuk melindungi dari benturan</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Cocok untuk pengiriman jarak jauh</span>
                    </div>

                    <div class="section-subtitle">
                        <i class="fas fa-boxes"></i>
                        Penggunaan Umum
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Box minuman (botol, kaleng, kemasan liquid)</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Box elektronik (TV, komputer, gadget)</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Peralatan rumah tangga</span>
                    </div>
                </div>
            </div>

            <!-- BC Flute -->
            <div class="flute-card" id="b-and-c-type">
                <div class="flute-image-container">
                    <img src="static/b&c-flute-cardboard.jpg" alt="BC Flute" class="flute-image">
                    <div class="flute-badge">BC FLUTE</div>
                </div>
                <div class="flute-content">
                    <h2 class="flute-title">
                        <span class="flute-icon"><i class="fas fa-layer-group"></i></span>
                        BC Flute (Double Wall)
                    </h2>

                    <div class="section-subtitle">
                        <i class="fas fa-clipboard-list"></i>
                        Karakteristik
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Gabungan dari B Flute dan C Flute (2 gelombang)</span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Ketebalan bisa mencapai <strong>7 mm</strong></span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Konstruksi double wall untuk kekuatan maksimal</span>
                    </div>

                    <div class="section-subtitle">
                        <i class="fas fa-star"></i>
                        Kelebihan
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Sangat kuat dan tahan lama</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Lebih tahan terhadap beban berat dan tumpukan tinggi</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Perlindungan maksimal untuk barang berharga</span>
                    </div>

                    <div class="section-subtitle">
                        <i class="fas fa-boxes"></i>
                        Penggunaan Umum
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Outer box mebel (furnitur, cabinet)</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Galon air mineral dan produk berat</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Mesin dan sparepart mobil</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Outer box untuk ekspor internasional</span>
                    </div>
                </div>
            </div>

            <!-- E Flute -->
            <div class="flute-card" id="e-type">
                <div class="flute-image-container">
                    <img src="static/e-flute-cardboard.jpg" alt="E Flute" class="flute-image">
                    <div class="flute-badge">E FLUTE</div>
                </div>
                <div class="flute-content">
                    <h2 class="flute-title">
                        <span class="flute-icon"><i class="fas fa-gem"></i></span>
                        E Flute (Premium)
                    </h2>

                    <div class="section-subtitle">
                        <i class="fas fa-clipboard-list"></i>
                        Karakteristik
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Jenis gelombang paling tipis <strong>1 - 1,8 mm</strong></span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Gelombang sangat rapat dan halus</span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Permukaan sangat halus dan rata</span>
                    </div>
                    <div class="characteristic-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Umumnya hanya single wall</span>
                    </div>

                    <div class="section-subtitle">
                        <i class="fas fa-star"></i>
                        Kelebihan
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Hasil cetak paling bagus dan premium</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Paling ringan dan hemat ruang</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Sangat cocok untuk die cut yang rumit dan detail</span>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tampilan elegan untuk display produk</span>
                    </div>

                    <div class="section-subtitle">
                        <i class="fas fa-boxes"></i>
                        Penggunaan Umum
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Inner box untuk kosmetik premium</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Packaging parfum dan fragrance</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Box untuk drilling, baut, dan komponen kecil</span>
                    </div>
                    <div class="usage-item">
                        <i class="fas fa-arrow-right"></i>
                        <span>Display produk di retail dan toko</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Table Section -->
    <section class="comparison-section">
        <div class="container">
            <h2 class="comparison-title">Panduan Pemilihan Karton</h2>
            <p class="comparison-subtitle">Temukan jenis karton yang paling sesuai dengan kebutuhan Anda</p>
            
            <div class="comparison-table