<?php 
    $car_id = $_GET['id'];
    $qry = "DELETE FROM car where id='".$car_id."'";

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myproject";
    //create connection
    $con = mysqli_connect($server,$username,$password,$database);
    mysqli_query($con,$qry);

    echo '<script>alert("Car Deleted successfully");
    window.location = "admincardata.php" ;
    </script>';
?>