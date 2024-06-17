<?php 
if (isset($_POST['submit'])) {
    $userid = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $imagePath = "myprofile/" . $_FILES["image"]["name"];
    $date = $_POST['date'];
    
    // Move the uploaded image to the designated directory
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    // Check if the appropriate condition is met (e.g., !empty($name))
    if (!empty($name)) {
        $qry = "UPDATE signup SET name='".$name."', email='".$email."', date='".$date."', image_path='".$imagePath."' WHERE user_id='".$userid."'";

        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "myproject";
        
        // Create connection
        $con = mysqli_connect($server, $username, $password, $database);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Perform the query
        if (mysqli_query($con, $qry)) {
            echo '<script>alert("Data updated successfully");
            window.location = "profile.php" ;
            </script>';
        } else {
            echo "Error updating data: " . mysqli_error($con);
        }

        // Close the connection
        mysqli_close($con);
    } else {
        echo "Name is required."; // or any other appropriate error message
    }
}
?>