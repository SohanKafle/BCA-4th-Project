<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="img/car10.png" type="image/x-icon">
    <!-- LInk To CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script type="text/javascript">
        function validateForm() {
            var name = document.forms["signupForm"]["name"].value;
            var email = document.forms["signupForm"]["email"].value;
            var phone = document.forms["signupForm"]["phone"].value;
            var password = document.forms["signupForm"]["password"].value;

            function isValidEmail(email) {
                var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,4}$/;
                return pattern.test(email);
            }

            function isValidPhoneNumber(phone) {
                var pattern = /^\d{10}$/; // Assumes a 10-digit phone number
                return pattern.test(phone);
            }

            function isValidName(name) {
                var pattern = /^[a-zA-Z ]+$/; // Only letters and spaces
                return pattern.test(name);
            }

            if (name === "") {
                alert("Name field is required");
                return false;
            } else if (!isValidName(name)) {
                alert("Invalid name. Please enter valid name.");
                return false;
            }

            if (phone === "") {
                alert("Phone is required");
                return false;
            } else if (!isValidPhoneNumber(phone)) {
                alert("Invalid phone number format. Please enter 10 digits.");
                return false;
            }

            if (email === "") {
                alert("Email is required");
                return false;
            } else if (!isValidEmail(email)) {
                alert("Invalid email format");
                return false;
            }

            if (password === "") {
                alert("Password is required");
                return false;
            } else if (password.length < 8) {
                alert("Password must be at least 8 characters long");
                return false;
            }

            return true; // Form is valid
        }
    </script>
</head>

<body>
    <!-- Navbar -->
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="index.php" class="logo"><i class='bx bx-home'></i>SK Car Rental</a>

            <!-- Log In Button -->
            <a href="login.php" class="btn">Log In</a>
        </div>

    </header>
    <!-- Sign Up -->
    <div class="login container">
        <div class="login-container">
            <h2>Welcome , Let's get started</h2>
            <!-- Signup Form -->
            <form method="POST" onsubmit="return validateForm()" name="signupForm">
                <span>Full Name</span>
                <input type="text" name="name" id="name" placeholder="Your Name" required>
                <span>Enter your email address</span>
                <input type="email" name="email" id="email" placeholder="yourmail@gmail.com" required>
                <span>Phone</span>
                <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
                <span>Enter your password</span>
                <input type="password" name="password" id="password" placeholder="At least 8" required>
                <input type="submit" name="submit" value="Sign Up" class="buttom">
                <a href="login.php">Already have an account?</a>
            </form>
        </div>
        <!-- Log In Image -->
        <div class="login-image">
            <img src="img/car10.png" alt="">
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
        <p>&#169; All Right Reserved SKCARRENTAL</p>
    </div>

  

</body>

</html>







<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myproject";
    $con=mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("Connection Failed:" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Use prepared statement to prevent SQL injection
$stmt = mysqli_prepare($con, "INSERT INTO signup (name, email, phone, password) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $hashedPassword);

if (mysqli_stmt_execute($stmt)) {
    
    
// Admin's email address
$to = "kaflesohan1@gmail.com";
// Email subject
$subject = 'New Account Creation';

// Email content
$message = "Hello Admin, $name". "has successfully created an account in SK CAR RENTAL.";

// Email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: your_email@example.com" . "\r\n";

// Send the email
if (mail($to, $subject, $message, $headers)) {

    header("location: login.php");
} else {
    echo'Failed to send email.';
    
}
}
?>



