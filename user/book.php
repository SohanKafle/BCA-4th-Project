<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "myproject";
$con = mysqli_connect($server, $username, $password, $database);
$currentDate = date('Y-m-d');
$user_id=$_SESSION['user_id'];
$carid=$_GET['car_id'];
$qry="INSERT INTO book(user_id,id,book_date)values($user_id,$carid,'$currentDate')";

if(mysqli_query($con,$qry)){
    echo'<script>alert("Book successfull.") 
    window.location=readdata.php
    </script>';
}
else{
    echo'<script>alert("Sorry! Unable to book.")</script>';
}
?>