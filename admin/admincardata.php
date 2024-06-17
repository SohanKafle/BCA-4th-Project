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
    <title>Manage Cars</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .heading {
            text-align: center;
            margin-bottom: 2rem;
        }

        .heading span {
            font-weight: 500;
            color: var(--main-color);
        }

        .heading h2 {
            font-size: 1.7rem;
        }

        .heading p {
            font-size: 0.938rem;
        }

        .properties {
            background: #fbfbfb;
            border-radius: 2rem;
        }

        .properties-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, auto));
            gap: 3rem;
            padding: 0 50px;
        }

        .properties-container .box {
            background: var(--bg-color);
            padding: 10px;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
        }

        .properties-container .box:hover {
            transform: translateY(-10px);
            transition: 0.5s;
        }

        .properties-container .box img {
            border-radius: 1rem;
            height: 220px;
            object-fit: cover;
            object-position: center;
        }

        .properties-container .box h3 {
            font-size: 1rem;
            font-weight: 600;
            float: right;
        }

        .properties-container .box .content {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .properties-container .box .content .text h3 {
            font-weight: 500;
            float: left;
        }

        .properties-container .box .content .text p {
            font-size: 0.8rem;
        }

        .properties-container .box .content .icon {
            display: flex;
            align-items: center;
            column-gap: 1rem;
        }

        .properties-container .box .content .icon .bx {
            display: flex;
            align-items: center;
            font-size: 15px;
            text-decoration: underline;
        }

        .properties-container .box .content .icon span {
            font-size: 12px;
            font-weight: 500;
            margin-left: 4px;
        }

        .add-car-button {
            display: inline-block;
            background-color: #007BFF;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            margin-left: 130vh;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-car-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashboard.php">
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
                <a href="rent.php" class="add-car-button">Add Car</a>

                <div class="user">
                    <img src="../img/sohan.jpg" alt="">
                </div>
            </div>

            <br>

            <div class="properties-container container">
                <?php foreach ($cars as $cars) : ?>
                    <div class="box">
                        <img src="../<?php echo $cars['image'] ?>" alt="carimage">
                        <p>Car no:<?php echo $cars['no'] ?></p>
                        <h3>Rs<?php echo $cars['price'] ?></h3>
                        <div class="content">
                            <div class="text">
                                <h3><?php echo $cars['name'] ?></h3><br>
                                <p><?php echo $cars['place'] ?></p>
                            </div>
                            <div class="icon">
                                <a href="show.php" class="bx">Show more</a>
                            </div>
                        </div><br>
                        <a href="editcar.php?id=<?php echo $cars['id']; ?>">Edit</a>
                        <a href="deletecar.php?id=<?php echo $cars['id']; ?>">Delete</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <!-- =========== Scripts =========  -->
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>