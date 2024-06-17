<?php 
    $userid = $_GET['id'];
    $qry = "DELETE FROM signup where user_id='".$userid."'";

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myproject";
    //create connection
    $con = mysqli_connect($server,$username,$password,$database);
    mysqli_query($con,$qry);

    echo '<script>alert("Data Deleted successfully");
    window.location = "userdetails.php" ;
    </script>';
?>       