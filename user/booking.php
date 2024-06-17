
<?php $carpic=$_GET['car_pic'] ?>
<?php $carid=$_GET['id'] ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SK CAR RENTAL | Car Booking</title>
    <link rel="shortcut icon" href="../img/car10.png" type="image/x-icon">
    <!-- LInk To CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>

    <!-- Navbar -->
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="readdata.php" class="logo"><i class='bx bx-home'></i>SK Car Rental</a>
        </div>

    </header>

    <!-- Book Now -->
    <div class="booking container">
        <div class="booking-container">
            <h2>BOOK NOW</h2>
            <p>Fill the booking form with correct information.</p>
            <!-- Booking Form -->
            <form action="book.php?car_id=<?php echo $carid; ?>" method="POST">
                <span>Pick Up Point</span>
                <input type="text" name="" id="" placeholder="Pick Up Location" required>
                <span>Destination Point</span>
                <input type="text" name="" id="" placeholder="Destination Location" required>
                <span>Start Date</span>
                <input type="date" name="" id="" required>
                <span>End Date</span>
                <input type="date" name="" id="" required>
                <span>Pick Up Time</span>
                <input type="time" name="" id="" required>
                <span>Drop Time</span>
                <input type="time" name="DropTime" required>

                
                <input type="submit" name="submit" value="Book Now" class="buttom">
            </form>
        </div>
                <!-- Booking Image -->
                <div class="booking-image">
                    <img src="../<?php echo $carpic ?>" alt="">
                </div>
    </div>
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


</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $pickup = $_POST['pickup'];
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $pickup_time = $_POST['pickup_time'];
    $drop_time = $_POST['drop_time'];

    if (empty($pickup) || empty($destination) || empty($start_date) || empty($end_date) || empty($pickup_time) || empty($drop_time)) {
        die('All fields are required.');
    }

    if (!preg_match("/^[a-zA-Z ,'-]+$/", $pickup) || !preg_match("/^[a-zA-Z ,'-]+$/", $destination)) {
        die('Invalid characters in Pick Up or Destination fields.');
    }

    if (strtotime($end_date) <= strtotime($start_date)) {
        die('End date must be after the start date.');
    }

    if (!preg_match("/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/", $pickup_time) || !preg_match("/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/", $drop_time)) {
        die('Invalid time format. Use HH:MM (24-hour format).');
    }

    
        
}
?>
