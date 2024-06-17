<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script type="text/javascript">
function validateForm() {
    var name = document.forms["signupForm"]["name"].value;
    var email = document.forms["signupForm"]["email"].value;
    var phone = document.forms["signupForm"]["phone"].value;
    var password = document.forms["signupForm"]["password"].value;

    function isValidEmail(email) {
        var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,4}$/;
        return pattern.test(email);
    }

    function isValidPhoneNumber(phone) {
        var pattern = /^\d{10}$/; // Assumes a 10-digit phone number
        return pattern.test(phone);
    }

    function isValidName(name) {
        var pattern = /^[a-zA-Z ]+$/; // Only letters and spaces
        return pattern.test(name);
    }

    if (name === "") {
        alert("Name field is required");
        return false;
    } else if (!isValidName(name)) {
        alert("Invalid name. Please enter valid name.");
        return false;
    }

    if (phone === "") {
        alert("Phone is required");
        return false;
    } else if (!isValidPhoneNumber(phone)) {
        alert("Invalid phone number format. Please enter 10 digits.");
        return false;
    }

    if (email === "") {
        alert("Email is required");
        return false;
    } else if (!isValidEmail(email)) {
        alert("Invalid email format");
        return false;
    }

    if (password === "") {
        alert("Password is required");
        return false;
    } else if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    }

    return true; // Form is valid
}
</script>
</body>
</html>
<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myproject";
    $con=mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("Connection Failed:" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Use prepared statement to prevent SQL injection
$stmt = mysqli_prepare($con, "INSERT INTO signup (name, email, phone, password) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $hashedPassword);

if (mysqli_stmt_execute($stmt)) {
    
    
// Admin's email address
$to = "kaflesohan1@gmail.com";
// Email subject
$subject = 'New Account Creation';

// Email content
$message = "Hello Admin, $name". "has successfully created an account in SK CAR RENTAL.";

// Email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: your_email@example.com" . "\r\n";

// Send the email
if (mail($to, $subject, $message, $headers)) {

    header("location: login.php");
} else {
    echo'Failed to send email.';
    
}
}
?>
