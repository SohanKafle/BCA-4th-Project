<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SK CAR RENTAL | Our Services</title>
    <link rel="shortcut icon" href="../img/car10.png" type="image/x-icon">
    <!-- Link To CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .about {
            background-image: url(../image/service.jpg);
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            align-items: center;
        }

        .about_content {
            margin-top: 20vh;
            font-size: 40px;
            color: black;
            margin-bottom: 20vh;
        }

        h1 {
            color: navy;
            margin-left: 20px;

        }

        p {
            color: black;
            font-size: 50px;
            font-weight: 545;
            font-family: 'Montserrat', sans-serif;
            padding-right: 20px;
            padding-left: 20px;
        }

        .copyright {
            padding: 20px;
            text-align: center;
            color: var(--bg-color);
            background: var(--main-color);
        }

        p1 {
            margin-left: 1rem;
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
    <!-- Navbar -->
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="index.php" class="logo"><img src="../img/logoo.png" style="height: 70px;"></a>
            <!-- Menu Icon -->
            <input type="checkbox" name="" id="menu">
            <label for="menu" <i class='bx bx-menu' id="menu-icon"></i></label>
            <!-- Nav List -->
            <ul class="navbar">
                <li><a href="readdata.php">Home</a></li>
                <li><a href="aboutt.php">About Us</a></li>
                <li><a href="servicess.php">Our Services</a></li>
                <li><a href="contactt.php">Contact Us</a></li>
            </ul>

            <div class="profile"><img src="../img/aakash.jpg"></div>
        </div>
    </header>

    <section class=" about">
        <div class="container">
            <ul class="about_content">
                <li>Our Services</li>
            </ul>
        </div>
    </section>


    <section class="properties container" id="properties">
        <div class="heading">
            <h1>Car Rental Nepal - Services</h1>

        </div>
        <div class="properties-container container">
            <!-- Box 1 -->
            <div class="box">
                <img src="../img/fam.jpg" alt="">
                <div class="content">
                    <div class="text">
                        <h3>Family Holiday Tours in Nepal</h3><br>
                        <p>We offer different types of cars for the family holiday tour in Nepal. You may rent a car for your family with comfortable journey withn Nepal.</p>
                    </div>
                </div>
            </div>
            <!-- Box 2 -->
            <div class="box">
                <img src="../img/wedd.jpeg">
                <div class="content">
                    <div class="text">
                        <h3>Rent a car for Wedding</h3><br>
                        <p>Do you need to rent a car for Wedding, After being a car rental company; we offer car rental for Wedding in Kathmandu. We also offer decoration services in the car for the wedding event.Just contact us if you need to rent a car for the wedding purpose.</p>
                    </div>
                </div>
            </div>
            <!-- Box 3 -->
            <div class="box">
                <img src="../img/hon.jpg" alt="">
                <div class="content">
                    <div class="text">
                        <h3>Honeymoon Tour in Nepal</h3><br>
                        <p>We offer different types of cars for the Honeymoon tour in Nepal. You may rent a car for you and your partner with comfortable journey within Nepal.</p>
                    </div>
                </div>
            </div>
            <!-- Box 4 -->
            <div class="box">
                <img src="../img/air.jpg" alt="">
                <div class="content">
                    <div class="text">
                        <h3>Kathmandu Airport Transfer</h3><br>
                        <p>Arriving at Kathmandu Airport and worry about the transfer to your hotel or any location then we offer Kathmandu Airport Transfers services. We are the best Kathmandu Airport Transfers service provider because of a large number of airport transfer cars are available with us.</p>
                    </div>
                </div>
            </div>
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
        <p1>&#169;All Right Reserved SKCARRENTAL</p1>
    </div>


</body>

</html>