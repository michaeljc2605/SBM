<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand fs-4" href="staffmainpage.php">SBM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto"> <!-- Align items to the left -->
                <li class="nav-item">
                    <a class="nav-link" href="manageJobs.php">Cek Lowongan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="seeAppli.php">Cek Applicant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="intro.php">Log Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">To be continued...</a>
                </li>
                
            </ul>
        </div>
    </nav>