<?php 
session_start();

$title = "Welcome";

if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}
?>
<?php include 'header.php' ?>
<section class="hero">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 mb-3" data-aos="fade-up">
                <h1>Welcome</h1>
            </div>
            <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                <a href="login.php">
                    <button class="btn arrow">Get Started <i class="ri-arrow-right-line"></i></button>
                </a>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'?>