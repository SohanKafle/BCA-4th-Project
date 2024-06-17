<?php 
session_start();
    $user_id = $_SESSION['user_id'];
    $book_id =$_GET['book_id'];
    $qry = "DELETE FROM book where user_id='".$user_id."' && book_id= '".$book_id."'";

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myproject";
    //create connection
    $con = mysqli_connect($server,$username,$password,$database);
    mysqli_query($con,$qry);
    echo '<script>alert("Data Deleted Successfully");
    window.location = "car.php" ;
    </script>';

    
?>