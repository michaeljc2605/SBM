<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sumber Berlian Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <!-- Include -->
    <?php include("navbar.php"); ?>

    <?php include("mainpage/banner-mainpage.php"); ?>
    <?php include("mainpage/product-full-card.php"); ?>
    <?php include("mainpage/triocontainer.php"); ?>
    <?php include("mainpage/process-section.php"); ?>
    <?php include("mainpage/whyus.php"); ?>
    <?php include("mainpage/testimonial.php"); ?>
    <?php include("mainpage/faq.php"); ?>
    <?php include("mainpage/cta.php"); ?>
    <?php include("Footer.php"); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to change content visibility
        function changeContent(sectionId, link) {
            // Hide all sections
            var sections = document.querySelectorAll('.content-section');
            sections.forEach(function(section) {
                section.classList.add('d-none');
            });

            // Show the selected section
            document.getElementById(sectionId).classList.remove('d-none');

            // Update active class for navbar
            var links = document.querySelectorAll('.nav-link');
            links.forEach(function(navLink) {
                navLink.classList.remove('active');
            });
            link.classList.add('active');
        }

        // Auto-start carousel
        document.addEventListener('DOMContentLoaded', function() {
            var bannerCarousel = new bootstrap.Carousel(document.getElementById('bannerCarousel'), {
                interval: 3000,
                wrap: true
            });
        });
    </script>
</body>

</html>