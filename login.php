<?php 
include 'config.php';
session_start();

$title = "Login";

if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

$message = "";

if (isset($_GET['registered']) && $_GET['registered'] === 'true') {
    $message = "Registration successful. You can now log in.";
} elseif (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    $message = "You have been logged out.";
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;

            header("Location: home.php");
            exit();
        } else {
            $message = "Invalid Password";
        }
    } else {
        $message = "User not found.";
    }
}
?>

<?php include 'header.php' ?>
<section class="hero login">
    <div class="container">
        <h1 class="text-center mb-3" data-aos="fade-up">Login</h1>
        <form action="login.php" method="post">
            <div class="form-floating mb-3" data-aos="fade-up" data-aos-delay="100">
                <input type="text" class="form-control" id="floatingInput" placeholder="" name="username" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3" data-aos="fade-up" data-aos-delay="200">
                <input type="password" class="form-control" id="floatingPassword" placeholder="" name="password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <p class="text-center mb-3" data-aos="fade-up" data-aos-delay="300">Don't have an account? <a href="register.php" class="text-decoration-none">Click here.</a></p>
            <?php 
            if (isset($message)) {
                echo '<p class="text-center"  data-aos="fade-up" data-aos-delay="400">' . $message . '</p>';
            }
            ?>
            <button class="btn w-100 mb-3" data-aos="fade-up" data-aos-delay="500">Login</button>
            <a href="index.php" class="btn w-100 back-button" data-aos="fade-up" data-aos-delay="600">Go Back</a>
        </form>
    </div>
</section>
<?php include 'footer.php'?>