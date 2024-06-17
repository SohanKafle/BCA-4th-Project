<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
    <style type="text/css">

       
       *{
            background-color: violet;
        }
        .admin{
            border: 1px solid black;
            width: 40vh;
            height: 35vh;
            border-radius: 25px;
            margin-left: 85vh;
            background-color: white;
        }

        span{
            margin-left: 30px;
            background-color: white;
            font-size: 20px;
        }

        input[type="text"],input[type="password"]
        {
            height: 20px;
            margin-left: 30px;
            margin-top: 10px;
            border-radius: 25px;
             background-color: white;
        }

        input[type="submit"]
        {
            margin-left: 90px;
            border-radius: 25px;
             background-color: white;
             font-size: 20px;
             background-color:skyblue;
        }

        h1{
            margin-top: 30vh;
            margin-left: 80vh;
        }
    </style>
</head>
<body>
 
    <h1>ADMIN LOGIN PAGE</h1>
	<form action="" method="POST" class="admin">
        <span>Enter Username</span>
		<input type="text" name="name" placeholder="username"><br><br>
        <span>Enter Password</span>
		<input type="password" name="password" placeholder="password"><br><br>
		<input type="submit" name="submit" value="login">
	</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM admin WHERE name='$name' and password='$password'";

    $con = mysqli_connect("localhost","root","","myproject");
    if($con === false){
        die ("Error: ". mysqli_connect_error());
    }

    if($result = mysqli_query($con,$qry)){
        $row = mysqli_num_rows($result);
        
        if($row >0){
            $_SESSION['loginuser'] = 'isloggedin';
            header('location:dashboard.php');
        }
        else
        {
            echo "<script>alert('Invalid login details'); window.location.href='admin.php';</script>";
        }
    }

    else
    {
        echo "Error ";
    }
    
    mysqli_close($con);
    

}

?>