<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "myproject";
//create connection
$con = mysqli_connect($server, $username, $password, $database);

$userid = $_GET['id'];
$qry = "SELECT * FROM signup where user_id='" . $userid . "'";
$data = mysqli_query($con, $qry);
$row = $data->fetch_array();
?>
<h2>Edit Details</h2>
<form action="updateuser.php" method="POST">
    <br><br>
    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
    <input type="text" name="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>">
    <br><br>
    <input type="text" name="email" placeholder="Enter Email" value="<?php echo $row['email'] ?>">
    <br><br>
    <input type="text" name="phone" placeholder="Enter Phone" value="<?php echo $row['phone'] ?>">
    <br><br>
    <input type="text" name="password" placeholder="password" value="<?php echo $row['password'] ?>">
    <br><br>

    <button type="submit">Update user</button>
</form>



