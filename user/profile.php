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
$qry = "SELECT * FROM signup where email='$useremail'";
if (!$result = mysqli_query($con, $qry)) {
	echo 'Error: ' . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Profile</title>

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<style type="text/css">
		* {
			margin: 0px;
			padding: 0px;
		}

		.first {
			border: 3px solid black;
			margin-top: 30px;
			margin-left: 60vh;
			width: 100vh;
			border-radius: 20px;
		}

		.nav {
			background-color: #5b4eee;
			right: 0;
			left: 0;
			height: 60px;
			margin-top: 0px;
			text-align: center;
			color: white;
		}

		img {
			height: 50px;
			width: 50px;
			margin-left: 5px;
		}

		.line {
			height: 3px;
			width: 100%;
			background-color: black;
		}

		button {

			margin-top: 20px;
			height: 40px;
			width: 100px;
			background-color: #5b4eee;
			color: white;
			border-radius: 5px;
			margin-left: 40vh;

		}

		button:hover {
			background-color: skyblue;
		}

		h3 {
			margin-left: 5px;
		}

		h2 {
			margin-left: 5px;
		}
	</style>
</head>

<body>

	<div class="nav">
		<h1>USER PROFILE..</h1>
	</div>
<a href="readdata.php" class="logo"><i class='bx bx-home'></i>SK Car Rental</a>
	<div class="first">
    	 <?php if ($row = mysqli_fetch_assoc($result)) { ?>
          <img src="<?php echo $row['image_path'] ?>"> 
        <div class="line"></div>
     
            <h2> NAME: <?php echo $row['name'] ?></h2><br>
            <h3>EMAIL: <?php echo $row['email'] ?></h3>
            <h3>PHONE NUMBER: <?php echo $row['phone'] ?></h3>
            <h3>D.O.B: <?php echo $row['date']?></h3>

            <a href="editprofile.php"><button>Edit profile</button></a>
        <?php } else { ?>
            <h2>No user data found</h2>
        <?php } ?>
    </div>

</body>

</html>