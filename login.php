<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="shortcut icon" href="img/car10.png" type="image/x-icon">
    <!-- LInk To CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <!-- Navbar -->
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="index.php" class="logo"><i class='bx bx-home'></i>SK Car Rental</a>

            <!-- Log In Button -->
            <a href="signup.php" class="btn">Sign Up</a>
        </div>

    </header>
    <!-- Log In -->
    <div class="login container">
        <div class="login-container">
            <h2>Login To Continue</h2>
            <p>Log in with your data that you entered during your registration.</p>
            <!-- Login Form -->
            <form action="" method="POST">
                <span>Enter your email address</span>
                <input type="email" name="email" id="" placeholder="yourmail@gmail.com" required>
                <span>Enter your password</span>
                <input type="password" name="password" id="" placeholder="Password" required>
                <input type="submit" value="Log In" name="submit" class="buttom">
                <a href="#">Forget Password?</a>
            </form>
            <p>Don't have an account?</p>
            <a href="signup.php" class="btn">Sign up now</a>
        </div>
        <!-- Log In Image -->
        <div class="login-image">
            <img src="img/car9.png" alt="">
        </div>
    </div>

    <!-- Footer -->
    <section class="footer">
        <div class="footer-container container">
            <img src="img/logoo.png" alt="">
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="index.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="services.php">Our Services</a>
                <a href="admin.php">Admin Login</a>
            </div>
            <div class="footer-box">
                <h3>Locations</h3>
                <a href="#">Nawalpur</a>
                <a href="#">Chitwan</a>
                <a href="#">Kathmandu</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <a href="#">+977 9812211443</a>
                <a href="#">kaflesohan1@gmail.com</a>
                <div class="social">
                    <a href="https://www.facebook.com/sohanmessi10"><i class='bx bxl-facebook'></i></a>
                    <a href="https://twitter.com/SohanKafle"><i class='bx bxl-twitter'></i></a>
                    <a href="https://www.instagram.com/sohan_lm10/"><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Copyright -->
    <div class="copyright">
        <p>&#169;All Right Reserved SKCARRENTAL</p>
    </div>


</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "") {
        die('Email is required');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }


    if ($password == "") {
        die("Password is required");
    }


    $con = mysqli_connect("localhost", "root", "", "myproject");

    $qry = "SELECT * FROM signup WHERE email='$email'";



    if ($result = mysqli_query($con, $qry)) {
        $data = mysqli_fetch_assoc($result);
        $data_pass = $data['password'];
        if (password_verify($password, $data_pass)) {


            $user_id = $data['user_id'];

            $_SESSION['useremail'] = $email;
            $_SESSION['user_id'] = $user_id;


            header('location:user/readdata.php');
        } else {
            echo "<script>alert('Invalid login details.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "Error ";
    }




    mysqli_close($con);
}




?>