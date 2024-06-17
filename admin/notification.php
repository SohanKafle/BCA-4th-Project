<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "myproject";
//create connection
$con = mysqli_connect($server, $username, $password, $database);
$query = "SELECT b.*, d.*, r.*
          FROM book b
          JOIN signup d ON b.user_id = d.user_id
          JOIN car r ON b.id = r.id";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        .user-div {
            margin-left: 50vh;

        }

        .table {
            border-collapse: collapse;
            margin-left: 10%;
            text-align: center;
            background-color: white;
            margin-top: 60vh;

        }

        tr th {

            border: 1px solid black;
            background-color: lightblue;
            text-decoration: none;


        }

        tr th:hover {
            text-decoration: underline;
        }

        tr td {
            border: 1px solid black;
        }

        tr:nth-child(odd) {
            background-color: #FFCCCB;
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

                <div class="user">
                    <img src="../img/sohan.jpg" alt="">
                </div>
            </div>
            <div class="user-container">

                <table class="user-div">
                    <tr>

                        <th>
                            <h4> userid: </h4>
                        </th>
                        <th>
                            <h4>carid: </h4>
                        </th>
                        <th>
                            <h5>bookdate: </h5>
                        </th>
                        <th>
                            <h5>email</h5>
                        </th>
                        <th>
                            <h4>photo:</h4>
                        </th>
                        <th>Action</a></th>

                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>


                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['book_date']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><img src="../<?php echo $row['image']; ?>" style="height: 40px; width:50px;"></td>
                            <td>
                               <?php if($row['book_status']!= -1 && $row['book_status']!= 1){?>
                                <a class="bt" href="verify.php?book_id= <?php echo $row['book_id']; ?>&&car_id= <?php echo $row['id'] ?> "> Accept</a>
                                <br>
                                <a class="bt" href="rejected.php?book_id=<?php echo $row['book_id'];  ?>&&car_id= <?php echo $row['id'] ?> ">Decline</a>
                                <?php }
          elseif ($row['book_status'] == 1) { ?>
         <p>Already accepted</p>
     <?php } elseif ($row['book_status'] == -1) { ?>
         <p>Rejected</p>
     <?php } ?>
                            </td>

                        </tr>

                    <?php }
                    ?>
                </table>



            </div>

        </div>

        <!-- =========== Scripts =========  -->
        <script src="js/main.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>