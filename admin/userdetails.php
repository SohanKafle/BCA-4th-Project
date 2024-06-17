<?php  
$server = "localhost";
$username = "root";
$password = "";
$database = "myproject";
//create connection
$con = mysqli_connect($server, $username, $password, $database);
$query = "SELECT * FROM signup";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">

    table {
        border-collapse: collapse;
        margin-left: 15%;
        text-align: center;
        background-color: white;
        margin-top: 10vh;
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
                <table>
                    <tr>
                        <th><h4>ID:</h4></th>
                        <th><h4>Name:</h4></th>
                        <th><h5>Email:</h5></th>
                        <th><h5>Phone:</h5></th>
                        <th><h4>Password:</h4></th>
                        <th><a href="edituser.php?id=<?php echo $row['id']; ?>">Edit</a></th>
                        <th><a href="deleteuser.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a></th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><a href="edituser.php?id=<?php echo $row['user_id']; ?>">Edit</a></td>
                            <td><a href="deleteuser.php?id=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
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
