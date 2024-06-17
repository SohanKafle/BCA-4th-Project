<?php

session_start();
if (!isset($_SESSION['useremail'])) {
    header('location:../login.php');
}
$useremail = $_SESSION['useremail'];

$server = "localhost";
$username = "root";
$password = "";
$database = "myproject";
//create connection
$con = mysqli_connect($server, $username, $password, $database);


$qry = "SELECT * FROM signup where email='$useremail'";
$result = mysqli_query($con, $qry);
$row = mysqli_fetch_array($result);
?>

<style type="text/css">
    form {
        border: 3px solid black;
        width: 60vh;
        height: 90vh;
        margin-left: 80vh;
        margin-top: 5vh;
        border-radius: 5px;
    }

    h2 {
        background-color: skyblue;
        margin-top: 0px;
        height: 60px;
        font-size: 40px;

    }

    input[type="text"] {
        width: 80%;
        height: 40px;
        border-radius: 10px;
        margin-left: 20px;
    }

    input[type="file"],
    input[type="date"] {
        margin-left: 20px;
    }

    button {
        margin-left: 90px;
        height: 40px;
        width: 40%;
        background-color: grey;
        color: white;
        border: none;
        border-radius: 15px;
        cursor: pointer;
    }

    button:hover {
        background-color: #3492fd;
    }

    div {
        margin-bottom: 0px;
        height: 70px;

    }

    a {
      text-decoration: none;
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      display: inline-block;
      transition: background-color 0.3s ease;
      margin-left: 126px;
    }

    a:hover {
      background-color: #0056b3;
    }
</style>

<form action="updateprofile.php" method="POST" enctype="multipart/form-data">

    <h2>Edit Details</h2>

    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
    <input type="text" name="name" placeholder="name" value=<?php echo $row['name']; ?>>
    <br><br>
    <input type="text" name="email" placeholder="Enter Email" value="<?php echo $row['email'] ?>">
    <br><br>
    <input type="text" name="phone" placeholder="phone" value="<?php echo $row['phone'] ?>">
    <br><br>
    <input type="file" name="image" value="<?php echo $row['image_path'] ?>">
    <br><br>
    <input type="date" name="date" value="<?php echo $row['date'] ?>">
    <br><br>


    <button type="submit" name="submit">Update user</button><br><br>
    <a href="profile.php">Back</a>
    <div></div>
</form>