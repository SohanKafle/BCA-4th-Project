<?php

$con = mysqli_connect("localhost", "root", "", "myproject");
$book_id = $_GET['book_id'];
$car_id = $_GET['car_id'];

// Start a transaction
mysqli_autocommit($con, false);

$qry1 = "UPDATE book SET book_status = -1  WHERE book_id = $book_id";
$qry2 = "UPDATE car SET book_status = -1 WHERE id = $car_id";

$success = true;

if (!mysqli_query($con, $qry1)) {
    $success = false;
}

if (!mysqli_query($con, $qry2)) {
    $success = false;
}

if ($success) {
    // Commit the transaction
    mysqli_commit($con);
     echo'<script> alert (" Sucessfully Rejected ")
         window.location = "notification.php"
    </script>';

} else {
    // Rollback the transaction
    mysqli_rollback($con);
    echo 'Unable to apply updates';
}

// Restore autocommit mode
mysqli_autocommit($con, true);

// Close the connection
mysqli_close($con);
?>