<?php
include 'config.php';
session_start();

$title = "Signup";

if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];

    if ($password !== $password1) {
        $message = "Password do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (username, fullname, email, birthdate, age, sex, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $username, $fullname, $email, $birthday, $age, $sex, $hashed_password);

        if($stmt->execute()) {
            header("Location: login.php?registered=true");
            exit();
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();        
    }

}
?>
<?php include 'header.php' ?>
<section class="hero register">
    <div class="container">
        <h1 class="text-center mb-3" data-aos="fade-up">Signup</h1>
        <form action="register.php" method="post">
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="" name="username" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="" name="fullname" required>
                        <label for="floatingInput">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="" name="email" required>
                        <label for="floatingInput">Email Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="birthdayInput" name="birthday" onchange="calculateAge()" required>
                        <label for="birthdayInput">Birthday</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="ageInput" placeholder="" name="age" required min="16" max="150">
                        <label for="floatingInput">Age</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="sexSelect" aria-label="Sex" name="sex" required>
                            <option selected disabled>Sex</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="">Preferred Not To Say</option>
                        </select>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="" name="password" required>
                        <label for="floatingPassword">Enter Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="" name="password1" required>
                        <label for="floatingPassword">Confirm Password</label>
                    </div>
                </div>
            </div>

            <p class="text-center mb-3" data-aos="fade-up" data-aos-delay="200">Already have an account? <a href="login.php" class="text-decoration-none">Click here.</a></p>

            <?php 
            if (isset($message)) {
                echo '<p class="text-center" data-aos="fade-up" data-aos-delay="200">' . $message . '</p>';
            }
            ?>

            <button type="submit" class="btn w-100 mb-3" data-aos="fade-up" data-aos-delay="300">Signup</button>
            <a href="index.php" class="btn w-100 back-button" data-aos="fade-up" data-aos-delay="300">Go Back</a>
        </form>
    </div>
</section>
<?php include 'footer.php'?>