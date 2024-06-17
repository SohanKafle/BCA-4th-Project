<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <!-- LInk To CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
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
            margin-top: 10vh;
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
    </style>
</head>

<body>
    <div class="main">
        <a href="readdata.php" class="logo"><i class='bx bx-home'></i>SK Car Rental</a>
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

        $qry1 = "SELECT * FROM book";
        $result1 = mysqli_query($con, $qry1);
        $row1 = mysqli_fetch_assoc($result1);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cars[] = $row;
            }
        }
        ?>
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
                    </div><br>
                    <?php
                    if ( $cars['book_status'] != 1) {
                    ?>
                        <a href="booking.php?id=<?php echo $cars['id'] ?>&car_pic=<?php echo $cars['image'] ?>">Book now</a>
                    <?php } else { ?>
                        <p>Booked.</p>
                    <?php } ?>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>