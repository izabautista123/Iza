<?php 
$title = "Home";
include 'header.php';
?>

<!-- ========== Navbar ========== -->
<header id="header">
    <div class="dateTimeContainer">
        <p id="currentDateTime"></p>
    </div>
    <script src="assets/js/time.js"></script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Navbar end -->

<!-- ========== Hero ========== -->
<section id="hero">
    <div class="container">
        <h1 class="text-center" data-aos="fade-up">
           Welcome to my Home Page!
        </h1>
    </div>
</section>
<!-- Hero end -->
<?php include 'footer.php' ?>