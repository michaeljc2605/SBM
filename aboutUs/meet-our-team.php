<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Carousel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 2rem 0;
        }

        .team-section {
            padding: 4rem 0;
            overflow: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .section-title .highlight {
            color: #91756D;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #6c757d;
            font-weight: 300;
        }

        .team-carousel {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background: rgba(145, 117, 109, 0.02);
            padding: 2rem;
            margin: 0 auto;
        }

        .team-track {
            display: flex;
            animation: infiniteScroll 30s linear infinite;
            width: calc(300px * 12); /* 6 cards × 2 for seamless loop */
        }

        .team-track:hover {
            animation-play-state: paused;
        }

        @keyframes infiniteScroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-300px * 6)); /* Move by 6 cards width */
            }
        }

        .team-card {
            max-width: 280px;
            margin: 0 10px;
            background: linear-gradient(135deg, rgba(145, 117, 109, 0.05) 0%, rgba(166, 139, 130, 0.03) 50%, rgba(184, 160, 153, 0.02) 100%);
            border: 1px solid rgba(145, 117, 109, 0.15);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(145, 117, 109, 0.08);
            flex-shrink: 0;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(145, 117, 109, 0.2);
        }

        .team-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #91756D, #A68B82);
            border-radius: 50%;
            opacity: 0.05;
            transition: all 0.3s ease;
        }

        .team-card:hover::before {
            opacity: 0.1;
            transform: scale(1.2);
        }

        .team-image-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 1.5rem;
        }

        .team-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(145, 117, 109, 0.2);
            transition: all 0.3s ease;
        }

        .team-card:hover .team-image {
            border-color: #91756D;
            transform: scale(1.05);
        }

        .team-name {
            font-size: 1.25rem;
            font-weight: bold;
            color: #91756D;
            margin-bottom: 0.5rem;
        }

        .team-role {
            font-size: 0.95rem;
            color: #A68B82;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .team-description {
            font-size: 0.9rem;
            color: #6c757d;
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2.5rem;
            }

            .team-card {
                min-width: 250px;
                margin: 0 8px;
                padding: 1.5rem;
            }

            .team-image-container {
                width: 100px;
                height: 100px;
            }

            .team-track {
                width: calc(270px * 12);
                animation: infiniteScrollMobile 25s linear infinite;
            }

            @keyframes infiniteScrollMobile {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(calc(-270px * 6));
                }
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 2rem;
            }

            .team-card {
                min-width: 220px;
                margin: 0 5px;
            }

            .team-track {
                width: calc(230px * 12);
            }

            @keyframes infiniteScrollMobile {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(calc(-230px * 6));
                }
            }
        }
    </style>
</head>
<body>
    <section class="team-section">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h3 class="section-title">Meet Our <span class="highlight">Team</span></h3>
                <p class="section-subtitle">The passionate professionals behind our success</p>
            </div>
            
            <!-- Team Carousel -->
            <div class="team-carousel">
                <div class="team-track" id="teamTrack">
                    <!-- Team cards will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <script>
        // Team data
        const teamMembers = [
            {
                name: "Jacky Antonius Candra",
                role: "Chief Executive Officer",
                description: "Memimpin visi strategis perusahaan dengan fokus pada pertumbuhan berkelanjutan dan inovasi dalam industri kemasan. Berpengalaman lebih dari 15 tahun dalam manufaktur dan pengembangan bisnis.",
                image: "/SBM/static/team/jacky.jpg"
            },
            {
                name: "Yulius Rman Wicaksono",
                role: "Internal Marketing Head",
                description: "Mengembangkan strategi pemasaran internal yang efektif untuk meningkatkan brand awareness dan engagement karyawan. Memastikan komunikasi internal berjalan optimal untuk mendukung tujuan perusahaan.",
                image: "/SBM/static/team/yulius.jpg"
            },
            {
                name: "Michael Joseph",
                role: "Head of IT",
                description: "Mengelola infrastruktur teknologi informasi perusahaan dan implementasi sistem ERP untuk meningkatkan efisiensi operasional. Memimpin transformasi digital dan keamanan data.",
                image: "/SBM/static/team/michael.jpg"
            },
            {
                name: "Yuyun Triwahyuni",
                role: "Head of Internal Administration",
                description: "Mengawasi seluruh proses administrasi internal, pengelolaan dokumen, dan koordinasi antar departemen. Memastikan kelancaran operasional kantor dan kepatuhan terhadap regulasi.",
                image: "/SBM/static/team/yuyun.jpg"
            },
            {
                name: "Ali Susanto",
                role: "Head of Production",
                description: "Memimpin seluruh operasi produksi dengan fokus pada efisiensi, quality control, dan target output. Mengoptimalkan proses manufaktur untuk memenuhi standar kualitas dan deadline pengiriman.",
                image: "/SBM/static/team/ali.png"
            },
            {
                name: "Budiharjono",
                role: "Director",
                description: "Bertanggung jawab atas kebijakan strategis perusahaan dan pengambilan keputusan bisnis utama. Membangun kemitraan strategis dan membimbing tim manajemen untuk mencapai target perusahaan.",
                image: "/SBM/static/team/budiharjono.jpg"
            },
            {
                name: "Angga Dwi Prasetyo",
                role: "Head of Warehousing Division",
                description: "Mengelola operasional gudang, sistem inventory, dan distribusi produk. Mengoptimalkan penyimpanan, pengelolaan stok, dan memastikan pengiriman tepat waktu kepada pelanggan.",
                image: "/SBM/static/team/angga.jpg"
            }
        ];


        // Create team cards
        function createTeamCards() {
            const teamTrack = document.getElementById('teamTrack');
            teamTrack.innerHTML = '';

            // Create cards twice for seamless infinite scroll
            for (let i = 0; i < 2; i++) {
                teamMembers.forEach((member) => {
                    const card = document.createElement('div');
                    card.className = 'team-card';
                    card.innerHTML = `
                        <div class="team-image-container">
                            <img src="${member.image}" alt="${member.name}" class="team-image">
                        </div>
                        <h4 class="team-name">${member.name}</h4>
                        <p class="team-role">${member.role}</p>
                        <p class="team-description">${member.description}</p>
                    `;
                    teamTrack.appendChild(card);
                });
            }
        }

        // Initialize carousel when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            createTeamCards();
        });
    </script>
</body>
</html>