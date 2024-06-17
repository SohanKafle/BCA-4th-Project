<?php
session_start();
if (!isset($_SESSION['useremail'])) {
    header('location:login.php');
}
$useremail = $_SESSION['useremail'];
$con = mysqli_connect("localhost", "root", "", "myproject");
if ($con === false) {
    die("Error on Connection " . mysqli_connect_error());
}
$qry = "SELECT * FROM signup WHERE email='$useremail'";
if (!$result = mysqli_query($con, $qry)) {
    echo 'Error : ' . mysqli_error($con);
}

$cars=[];
$qry1="SELECT * FROM car";
$result1=mysqli_query($con,$qry1);
if ($result1) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $cars[] = $row1;
    }
}

?>
<?php
$row = mysqli_fetch_assoc($result)

?>
<html>

<head>
    <title>Home Page</title>
    <link rel="shortcut icon" href="../img/car10.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style type="text/css">
        .dropdown {
            position: relative;
            display: inline-block;
        }

        h5 {
            margin-left: 12vh;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 200px;
            z-index: 1;
            background-color: #f9f9f9;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .profile img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 50%;
            margin-left: 70px;
        }
    </style>
</head>

<body>

    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="readdata.php" class="logo"><img src="../img/logoo.png" style="height: 70px;"></a>
            <!-- Menu Icon -->
            <input type="checkbox" name="" id="menu">
            <label for="menu" <i class='bx bx-menu' id="menu-icon"></i></label>
            <!-- Nav List -->
            <ul class="navbar">
                <li><a href="readdata.php">Home</a></li>
                <li><a href="aboutt.php">About Us</a></li>
                <li><a href="servicess.php">Our Services</a></li>
                <li><a href="contactt.php">Contact Us</a></li>
                <div class="dropdown">
                    <a href="#" class="dropdown-arrow"><img src="../img/bell.png" style="height:30px;width:30px;"></a>
                    <div class="dropdown-content" id="notificationPanel">
                        <ul id="notificationList">

                            <?php

                            $server = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "myproject";

                            // Create connection
                            $conn = mysqli_connect($server, $username, $password, $database);

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $user_id = $_SESSION['user_id'];

                            $qrey = "SELECT * FROM book WHERE user_id = $user_id";
                            $result4 = mysqli_query($conn, $qrey);
                            if ($result4) {
                                while ($rew = mysqli_fetch_assoc($result4)) {
                                    $book_id = $rew['book_id'];
                                    $book_status = $rew['book_status'];

                                    if ($book_status == 1) {
                                        $message = "<p>Your request for car has been approved successfully.</p>";
                                    } elseif ($book_status == -1) {
                                        $message = "<p>Your request has been rejected!</p>";
                                    } else {
                                        $message = " request pending......";
                                    }

                                    echo "$message";
                                }
                            } else {
                                echo "Error retrieving data: " . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                            ?>

                        </ul>
                    </div>
                </div>


            </ul>
            <div class="dropdown">

                <div class="profile"><img src="../img/aakash.jpg"></div>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="visitcar.php">Cars</a>
                    <a href="car.php">Booking</a>
                    <a href="../logout.php">Logout</a>
                </div>
                <h5><?php echo $row['name']; ?></h5>
            </div>
        </div>
    </header>

    <!-- Home -->
    <section class="home container" id="home">
        <div class="home-text">
            <h1>Find The<br>Perfect Car<br>For You.</h1>
            <a href="visitcar.php" class="btn">Book Now</a>
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
        <?php foreach ($cars as $car) : ?>
                <div class="box">
                    <img src="../<?php echo $car['image'] ?>" alt="carimage">
                    <p>Car no:<?php echo $car['no'] ?></p>
                    <h3>Rs<?php echo $car['price'] ?></h3>
                    <div class="content">
                        <div class="text">
                            <h3><?php echo $car['name'] ?></h3><br>
                            <p><?php echo $car['place'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
           
        </div>
    </section>
    <!-- About -->
    <section class="about container" id="about">
        <div class="about-img">
            <img src="../img/car3.jpg" alt="">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <h2>We Provide The Best <br>Cars For You !</h2>
            <p> Get yourself a best quality car at a best rate quoted anytime.</p>
            <p>We are The Nepal's Largest Car Rental Company. With 100s of fleets and best customer service, We offer you the best of class service.</p>
            <a href="aboutt.php" class="btn">Read More </a>
        </div>
    </section>

    <!-- Footer -->
    <section class="footer">
        <div class="footer-container container">
            <img src="../img/logoo.png" alt="">
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="readdata.php">Home</a>
                <a href="aboutt.php">About Us</a>
                <a href="servicess.php">Our Services</a>
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


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>