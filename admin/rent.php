<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #063970;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            font-size: 24px;
            border-bottom: 2px solid #3182ce;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .form-container input[type="file"] {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .form-container .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            font-weight: bold;
            color: #fff;
            background-color: #3182ce;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition-duration: 0.3s;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
        }

        .form-container .btn:hover {
            background-color: #2563eb;
        }

        button{
            margin-right: 0px;
            margin-left: 45%;
            width: 40vh;
            height: 25px;
            margin-top: 10px;
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>ENTER CAR DETAILS</h2><br>
            <form name="form" class="form" method="POST" action=""  enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="no">ENTER CAR NO.</label>
                    <input id="no" name="no" placeholder="Car No." type="text" required />
                </div><br>
                <div class="mb-4">
                    <label for="name">ENTER CAR NAME</label>
                    <input id="name" name="name" placeholder="Name" type="text" required />
                </div><br>
                <div class="mb-4">
                    <label for="price">ENTER PRICE</label>
                    <input id="price" name="price" type="text" placeholder="Price" required />
                </div><br>
                <div class="mb-4">
                    <label for="address">ENTER ADDRESS</label>
                    <input id="address" name="place" placeholder="Address" type="text" required />
                </div><br>
                <div class="mb-4">
                    <label for="image">CHOOSE FILE</label>
                    <input id="image" name="image"  type="file" accept="image/*" />
                </div><br>
        
                <div class="mb-6">
                    <input type="submit" value="Submit" class="btn" name="submit">
                </div>
            </form>
        </div>
    </div>
    <button><a href="dashboard.php">Click Here For Safe Exit</a></button>
</body>

</html>
<?php
if(isset($_POST['submit']))
{
    $no = $_POST['no'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $place = $_POST['place'];
    $imagePath = "image/" . $_FILES["image"]["name"];

    // Move uploaded image file into folder
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    if($no == "")
    {
        die('Car Number is required');
    }

    if($name == "")
    {
        die("Car Name is required");
    }

    if($price == "")
    {
        die("Price is required");
    }

    if($place == "")
    {
        die ('Address is required');
    }

    if($imagePath == "")
    {
        die ('Image is required');
    }

    $con = mysqli_connect("localhost","root","","myproject");
    if($con === false)
    {
        die("Error : " . mysqli_connect_error());
    }

    $qry = "INSERT INTO car (no, name, price, place, image) VALUES ('$no', '$name', '$price', '$place', '$imagePath')";

    if(mysqli_query($con, $qry))
    {
        echo '<script>alert("Data inserted successfully.")</script>';
    }
    else
    {
        echo '<script>alert("Cannot insert data.")</script>';
    }

    mysqli_close($con);
}
?>







<?php
if(isset($_POST['submit']))
{
    $no = $_POST['no'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $place = $_POST['place'];
    $imagePath = "image/" . $_FILES["image"]["name"];

    // Move uploaded image file into folder
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

     // File upload validation
     if (empty($_FILES["image"]["name"])) {
        die('Image is required');
    }

    // Check if image is a valid file type (you can extend this list)
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $imageExtension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    if (!in_array($imageExtension, $allowedExtensions)) {
        die('Invalid image file format. Supported formats: jpg, jpeg, png, gif');
    }

    // Validate other fields
    if (empty($no)) {
        die('Car Number is required');
    }

    if (empty($name)) {
        die('Car Name is required');
    }

    if (empty($price) || !is_numeric($price)) {
        die('Price is required and must be a numeric value');
    }

    if (empty($place)) {
        die('Address is required');
    }    


    $con = mysqli_connect("localhost","root","","myproject");
    if($con === false)
    {
        die("Error : " . mysqli_connect_error());
    }

    $qry = "INSERT INTO car (no, name, price, place, image) VALUES ('$no', '$name', '$price', '$place', '$imagePath')";

    if(mysqli_query($con, $qry))
    {
        echo '<script>alert("Data inserted successfully.")</script>';
    }
    else
    {
        echo '<script>alert("Cannot insert data.")</script>';
    }

    mysqli_close($con);
}
?>