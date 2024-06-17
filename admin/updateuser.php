<?php 
    $userid = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $qry = "UPDATE signup SET name='".$name."', email = '".$email."', phone = '".$phone."', password = '".$password."' where id='".$userid."'";

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myproject";
    //create connection
    $con = mysqli_connect($server,$username,$password,$database);
    mysqli_query($con,$qry);

    echo '<script>alert("Data updated successfully");
    window.location = "userdetails.php" ;
    </script>';
?>       