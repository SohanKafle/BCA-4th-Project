<?php
session_start();
if (!isset($_SESSION['loginuser']) || $_SESSION['loginuser'] != 'isloggedin') {
    header('location:admin.php');
}
$con = mysqli_connect("localhost", "root", "", "myproject");
if ($con === false) {
    die("Error on Connection " . mysqli_connect_error());
}
$qry = "SELECT * FROM admin";
if (!$result = mysqli_query($con, $qry)) {
    echo 'Error : ' . mysqli_error($con);
}
$qry1=" SELECT COUNT(*) AS total FROM signup";
$result1=mysqli_query($con,$qry1);
$row1=mysqli_fetch_assoc($result1);

$qry2=" SELECT COUNT(*) AS total FROM signup";
$result2=mysqli_query($con,$qry2);
$row2=mysqli_fetch_assoc($result2);

$qry3=" SELECT COUNT(*) AS total FROM car";
$result3=mysqli_query($con,$qry3);
$row3=mysqli_fetch_assoc($result3);

$qry4=" SELECT COUNT(*) AS total FROM book WHERE book_status IN(1)";
$result4=mysqli_query($con,$qry4);
$row4=mysqli_fetch_assoc($result4);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="car"></ion-icon>
                        </span>
                        <span class="title">ADMIN PANEL</span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="admincardata.php">
                        <span class="icon">
                            <ion-icon name="car-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Cars</span>
                    </a>
                </li>

                <li>
                    <a href="notification.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Bookings</span>
                    </a>
                </li>

                <li>
                    <a href="userdetails.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Users</span>
                    </a>
                </li>


                <li>
                    <a href="../logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    <img src="../img/sohan.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $row1['total']; ?></div>
                        <div class="cardName">REG USERS</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $row2['total']; ?></div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $row3['total']; ?></div>
                        <div class="cardName">LISTED CARS</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="car-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $row4['total']; ?></div>
                        <div class="cardName">TOTAL BOOKINGS</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">Rs.7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- =========== Scripts =========  -->
    <script src="js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>