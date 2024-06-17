<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "myproject";

//create connection
$con = mysqli_connect($server, $username, $password, $database);
$cars = [];
$qry = "SELECT * FROM car";
$result = mysqli_query($con, $qry);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cars[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SK CAR RENTAL</title>
    <link rel="shortcut icon" href="img/car10.png" type="image/x-icon">
    <!-- Link To CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <!-- Navbar -->
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="index.php" class="logo"><img src="img/logoo.png" style="height: 70px;"></a>
            <!-- Menu Icon -->
            <input type="checkbox" name="" id="menu">
            <label for="menu" <i class='bx bx-menu' id="menu-icon"></i></label>
            <!-- Nav List -->
            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Our Services</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>

            <!-- Log In Button -->
            <a href="login.php" class="btn">Log In</a>
        </div>

    </header>
    <!-- Home -->
    <section class="home container" id="home">
        <div class="home-text">
            <h1>Find The<br>Perfect Car<br>For You.</h1>
            <a href="signup.php" class="btn">Sign up</a>
        </div>
    </section>

    <section class="sales container" id="sales">
        <!-- Box 1 -->
        <div class="box">
            <i class='bx bx-user'></i>
            <h3>Make Your Dream True</h3>
            <p>At SK CAR RENTAL, we believe that every journey begins with a dream. Whether you're envisioning a great adventure, a coastal escape, or an urban exploration, we're here to help you turn your dreams into unforgettable memories.</p>
        </div>
        <!-- Box 2 -->
        <div class="box">
            <i class='bx bx-desktop'></i>
            <h3>Start Your Membership</h3>
            <p>Welcome to the next level of car rental experience! We're excited to offer you an exclusive membership program designed to enhance your journeys and simplify your travels. Join our community of avid explorers and enjoy a range of benefits tailored just for you.</p>
        </div>
        <!-- Box 1 -->
        <div class="box">
            <i class='bx bx-car'></i>
            <h3>Enjoy Your Ride</h3>
            <p>Every turn, every stop, every mile – they all contribute to the tapestry of memories you're weaving on this journey. Whether you're traveling solo, with friends, or with family, the moments you create while driving our cars will become cherished stories to share.</p>
        </div>
    </section>
    <!-- Properties -->
    <section class="properties container" id="properties">
        <div class="heading">
            <span>Recent</span>
            <h2>Our Featured Cars</h2>
            <p>Get Driven all over Nepal</p>
        </div>
        <div class="properties-container container">
            <?php foreach ($cars as $cars) : ?>
                <div class="box">
                    <img src="<?php echo $cars['image'] ?>" alt="carimage">
                    <p>Car no:<?php echo $cars['no'] ?></p>
                    <h3>Rs<?php echo $cars['price'] ?></h3>
                    <div class="content">
                        <div class="text">
                            <h3><?php echo $cars['name'] ?></h3><br>
                            <p><?php echo $cars['place'] ?></p>
                        </div>
                    </div><br>
                    <a href="login.php">Book Now</a>
                </div>
            <?php endforeach; ?>
    </section>
    <!-- About -->
    <section class="about container" id="about">
        <div class="about-img">
            <img src="img/car3.jpg" alt="">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <h2>We Provide The Best <br>Cars For You !</h2>
            <p> Get yourself a best quality car at a best rate quoted anytime.</p>
            <p>We are The Nepal's Largest Car Rental Company. With 100s of fleets and best customer service, We offer you the best of class service.</p>
            <a href="about.php" class="btn">Read More </a>
        </div>
    </section>
    <!-- Footer -->
    <section class="footer">
        <div class="footer-container container">
            <img src="img/logoo.png" alt="">
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="index.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="services.php">Our Services</a>
                <a href="admin/admin.php">Admin Login</a>
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