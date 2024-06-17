<?php 
 $no = $_POST['no'];
 $name = $_POST['name'];
 $price = $_POST['price'];
 $place = $_POST['place'];
 $imagePath = "image/" . $_FILES["image"]["name"];
 move_uploaded_file($_FILES["image"]["tmp_name"],$imagePath);

    
   $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myproject";
    
    //create connection
    $con = mysqli_connect($server,$username,$password,$database);

    $qry = "INSERT INTO car (no,name,price,place,image) VALUES ('".$no."','".$name."','".$price."','".$place."','".$imagePath."')";

    
   if(mysqli_query($con,$qry))
   {

    echo '<script>alert("Data inserted successfully");
    window.location = "rent.php" ;
    </script>';
 }
  mysqli_close($con);
?>     