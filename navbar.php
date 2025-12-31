<?php
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
        /* Base Styles */
        .modern-navbar {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: clamp(8px, 1.5vh, 12px) 0;
            transition: all 0.3s ease;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .modern-navbar.scrolled {
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(20px);
            padding: clamp(6px, 1vh, 8px) 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: clamp(8px, 2vw, 12px);
            font-weight: 700;
            font-size: clamp(1.3rem, 3vw, 1.8rem) !important;
            color: #fff !important;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            z-index: 1100;
            position: relative;
        }

        .navbar-brand span {
            font-size: clamp(1.3rem, 3vw, 1.8rem) !important;
            font-weight: 700 !important;
            color: #fff !important;
            line-height: 1 !important;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            color: #B8A099 !important;
        }

        .brand-logo {
            width: clamp(38px, 8vw, 45px);
            height: clamp(38px, 8vw, 45px);
            background: linear-gradient(135deg, #91756D 0%, #A68B82 50%, #B8A099 100%);
            border-radius: clamp(10px, 2vw, 12px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            color: #fff;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(145, 117, 109, 0.3);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .navbar-brand:hover .brand-logo {
            transform: rotate(5deg);
            box-shadow: 0 6px 20px rgba(145, 117, 109, 0.5);
            background: linear-gradient(135deg, #B8A099 0%, #A68B82 50%, #91756D 100%);
        }

        /* Custom toggle button - NO BOOTSTRAP */
        .custom-toggle {
            display: none;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 8px;
            width: 48px;
            height: 48px;
            cursor: pointer;
            position: relative;
            z-index: 1100;
            transition: all 0.3s ease;
            padding: 0;
        }

        .custom-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .custom-toggle:active {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0.95);
        }

        .custom-toggle:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(145, 117, 109, 0.3);
        }

        .hamburger-icon {
            position: absolute;
            width: 24px;
            height: 2px;
            background: white;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.3s ease;
        }

        .hamburger-icon::before,
        .hamburger-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: white;
            left: 0;
            transition: all 0.3s ease;
        }

        .hamburger-icon::before {
            top: -8px;
        }

        .hamburger-icon::after {
            top: 8px;
        }

        /* X animation when open */
        .custom-toggle.open .hamburger-icon {
            background: transparent;
        }

        .custom-toggle.open .hamburger-icon::before {
            top: 0;
            transform: rotate(45deg);
        }

        .custom-toggle.open .hamburger-icon::after {
            top: 0;
            transform: rotate(-45deg);
        }

        /* Show toggle on mobile */
        @media (max-width: 991px) {
            .custom-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }

        /* Submenu container */
        .nav-item.dropdown {
            position: relative;
        }

        .dropdown-menu-custom {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: rgba(26, 26, 46, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 12px;
            padding: 10px 0;
            min-width: 220px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 1040;
            margin-top: 5px;
        }

        .nav-item.dropdown:hover .dropdown-menu-custom {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-menu-custom .dropdown-item {
            color: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            text-decoration: none;
            display: block;
            transition: all 0.2s ease;
            font-size: clamp(0.9rem, 2vw, 1rem);
            border-left: 3px solid transparent;
        }

        .dropdown-menu-custom .dropdown-item:hover {
            background: rgba(145, 117, 109, 0.2);
            border-left-color: #B8A099;
            padding-left: 25px;
        }

        .dropdown-toggle-arrow {
            font-size: 0.7em;
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .nav-item.dropdown:hover .dropdown-toggle-arrow {
            transform: rotate(180deg);
        }

        /* Mobile menu */
        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-menu.mobile {
            display: none;
            position: fixed;
            top: clamp(60px, 10vh, 80px);
            right: 0;
            width: min(320px, 85vw);
            max-height: calc(100vh - clamp(60px, 10vh, 80px));
            background: rgba(26, 26, 46, 0.98);
            backdrop-filter: blur(20px);
            flex-direction: column;
            padding: 20px;
            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
            z-index: 1060;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .navbar-menu.mobile.show {
            display: flex;
            transform: translateX(0);
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: clamp(10px, 2vh, 12px) clamp(15px, 3vw, 20px) !important;
            border-radius: 25px;
            margin: 0 clamp(3px, 1vw, 5px);
            position: relative;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            overflow: hidden;
            font-size: clamp(0.9rem, 2vw, 1rem);
            white-space: nowrap;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: linear-gradient(135deg, rgba(145, 117, 109, 0.2), rgba(166, 139, 130, 0.2));
            border-radius: 50%;
            transition: all 0.4s ease;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .navbar-nav .nav-link:hover::before {
            width: 200px;
            height: 200px;
        }

        .navbar-nav .nav-link:hover {
            color: #B8A099 !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(145, 117, 109, 0.2);
        }

        .navbar-nav .nav-link.active {
            background: linear-gradient(135deg, #91756D 0%, #A68B82 50%, #B8A099 100%);
            color: #fff !important;
            font-weight: 600;
        }

        .navbar-nav .nav-link i {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            margin-right: 8px;
        }

        .login-btn {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white !important;
            border: none;
            padding: clamp(10px, 2vh, 12px) clamp(18px, 4vw, 24px) !important;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #91756D 0%, #A68B82 50%, #B8A099 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(145, 117, 109, 0.4);
            color: white !important;
        }

        /* Mobile overlay */
        .navbar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .navbar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* Desktop styles (992px and up) */
        @media (min-width: 992px) {
            .navbar-nav .nav-link {
                margin: 0 5px;
            }

            .navbar-menu.mobile {
                display: flex !important;
                position: static;
                width: auto;
                max-height: none;
                background: transparent;
                backdrop-filter: none;
                flex-direction: row;
                padding: 0;
                box-shadow: none;
                overflow: visible;
                border: none;
                transform: none;
            }

            .navbar-menu ul {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 10px;
            }
        }

        /* Mobile styles */
        @media (max-width: 991px) {
            .navbar-menu ul {
                width: 100%;
                flex-direction: column;
                gap: 5px;
            }

            .navbar-nav .nav-link {
                width: 100%;
                text-align: center;
                margin: 5px 0;
            }

            .login-btn {
                margin-top: 15px;
                width: 100%;
                text-align: center;
            }

            /* Mobile submenu */
            .dropdown-menu-custom {
                position: static;
                background: rgba(145, 117, 109, 0.1);
                border-radius: 8px;
                margin: 8px 0;
                padding: 8px 0;
                box-shadow: none;
                border: 1px solid rgba(145, 117, 109, 0.2);
            }

            .dropdown-menu-custom.show {
                display: block;
            }

            .nav-item.dropdown:hover .dropdown-menu-custom {
                display: none;
            }

            .dropdown-menu-custom .dropdown-item {
                padding: 8px 15px;
                text-align: center;
            }

            .dropdown-menu-custom .dropdown-item:hover {
                padding-left: 15px;
            }

            .dropdown-toggle-arrow {
                transition: transform 0.3s ease;
            }

            .nav-item.dropdown.mobile-expanded .dropdown-toggle-arrow {
                transform: rotate(180deg);
            }
        }

        /* Touch device improvements */
        @media (hover: none) and (pointer: coarse) {
            .navbar-nav .nav-link:hover {
                transform: none;
                box-shadow: none;
            }

            .navbar-nav .nav-link:active {
                transform: scale(0.98);
                background: rgba(145, 117, 109, 0.3);
            }

            .login-btn:hover {
                transform: none;
            }

            .login-btn:active {
                transform: scale(0.96);
            }
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    </style>

<!-- Modern Enhanced Navbar -->
<nav class="modern-navbar px-4">
    <div class="container-fluid">
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <a class="navbar-brand" href="intro.php" id="navbarBrand">
                <div class="brand-logo">
                    <i class="far fa-gem"></i>
                </div>
                <span>SBM</span>
            </a>
            
            <!-- Custom Toggle Button -->
            <button class="custom-toggle" id="customToggle" aria-label="Toggle menu">
                <span class="hamburger-icon"></span>
            </button>
            
            <!-- Desktop & Mobile Menu -->
            <div class="navbar-menu mobile" id="navbarMenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Cartons.php">
                            <i class="fas fa-boxes"></i>Our Cartons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="joblisting.php">
                            <i class="fas fa-briefcase"></i>Our Careers
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">
                            <i class="fas fa-info-circle"></i>About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactUs.php">
                           <i class="fas fa-envelope"></i>Contact Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link login-btn" href="login.php">
                            <i class="fas fa-sign-in-alt"></i>Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Overlay for mobile -->
<div class="navbar-overlay" id="navbarOverlay"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Add scroll effect to navbar
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.modern-navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Add active class to current page link
    document.addEventListener('DOMContentLoaded', function() {
        const currentPage = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('.nav-link:not(.login-btn)');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('active');
            }
        });
    });

    // CUSTOM TOGGLE FUNCTIONALITY - NO BOOTSTRAP INTERFERENCE
    const customToggle = document.getElementById('customToggle');
    const navbarMenu = document.getElementById('navbarMenu');
    const navbarOverlay = document.getElementById('navbarOverlay');

    customToggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        console.log('Toggle clicked!');
        
        const isOpen = this.classList.contains('open');
        console.log('Currently open:', isOpen);
        
        if (isOpen) {
            // Close menu
            this.classList.remove('open');
            navbarMenu.classList.remove('show');
            navbarOverlay.classList.remove('show');
            document.body.style.overflow = '';
            console.log('Menu closed');
        } else {
            // Open menu
            this.classList.add('open');
            navbarMenu.classList.add('show');
            navbarOverlay.classList.add('show');
            document.body.style.overflow = 'hidden';
            console.log('Menu opened');
        }
    });

    // Close menu when clicking overlay
    navbarOverlay.addEventListener('click', function() {
        customToggle.classList.remove('open');
        navbarMenu.classList.remove('show');
        navbarOverlay.classList.remove('show');
        document.body.style.overflow = '';
    });

    // Auto-close menu when clicking on nav links (mobile)
    document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle-link)').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                customToggle.classList.remove('open');
                navbarMenu.classList.remove('show');
                navbarOverlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    });

    // Mobile submenu toggle
    document.querySelectorAll('.dropdown-toggle-link').forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                const parent = this.closest('.nav-item.dropdown');
                const submenu = parent.querySelector('.dropdown-menu-custom');
                
                parent.classList.toggle('mobile-expanded');
                submenu.classList.toggle('show');
            }
        });
    });

    // Close submenu when clicking submenu items on mobile
    document.querySelectorAll('.dropdown-menu-custom .dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                customToggle.classList.remove('open');
                navbarMenu.classList.remove('show');
                navbarOverlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    });

    // Clean up on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            customToggle.classList.remove('open');
            navbarOverlay.classList.remove('show');
            document.body.style.overflow = '';
            document.querySelectorAll('.dropdown-menu-custom').forEach(menu => {
                menu.classList.remove('show');
            });
            document.querySelectorAll('.nav-item.dropdown').forEach(item => {
                item.classList.remove('mobile-expanded');
            });
        }
    });
</script>