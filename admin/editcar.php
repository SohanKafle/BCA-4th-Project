<?php
session_start();
?>
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "myproject";
//create connection
$con = mysqli_connect($server, $username, $password, $database);

$id = $_GET['id'];
$qry = "SELECT * FROM car where id='" . $id . "'";
$result = mysqli_query($con, $qry);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .form {
            border: 1px solid #ccc;
            width: 100vh;
            margin: 10vh auto;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .column {
            flex-basis: calc(50% - 10px);
            padding: 0 5px;
            gap: 10px;
            justify-content: space-between;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }


        input[type="text"],
        textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            color: white;
            background-color: #3492fd;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            width: 30%;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        input[type="submit"]:hover {
            background-color: #297ace;
        }

        input[type="file"] {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3492fd;
            color: white;
            border-radius: 25px;
            text-decoration: none;
            margin-top: 10px;
            text-align: center;
        }

        a.button:hover {
            background-color: #297ace;
        }
    </style>



</head>

<body>


    <span>
        <h1>PLEASE ENTER THE CAR DETAILS</h1>
    </span>

    <form class="form" method="POST" action="../carstoredata.php" enctype="multipart/form-data">

        <div class="flex">
            <div class="column">
                <label>ENTER CAR NO</label><br>
                <input type="text" name="no" value="<?php echo $row['no']; ?>"><br>

                <label>ENTER CAR NAME</label><br>
                <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>

                <label>ENTER ADDRESS</label><br>
                <input type="text" name="place" value="<?php echo $row['place']; ?>"><br>
            </div>
            <div class="column">

                <label>ENTER PRICE</label><br>
                <input type="text" name="price" value="<?php echo $row['price']; ?>"><br>


            </div>
        </div>

        <textarea name="description" placeholder="enter description" required maxlength="1000"></textarea>
        <label>Enter photo</label><br>
        <input type="file" name="image" value="<?php echo $row['image_Path']; ?>">
        <br><br>
    
        <input type="submit" name="submit" value="update">
        <div>
            <a href="admincardata.php">Click Here For Exit</a>
        </div>
    </form>


</body>

</html>

<?php
if (isset($_POST['submit'])) {
    // code...


    $no = $_POST['no'];
    $place = $_POST['place'];
    $price = $_POST['price'];
    $imagePath = "../imagefile/" . $_FILES["image"]["name"];
    $description = $_POST['description'];
    $qry1 = "UPDATE car SET no='" . $no . "', phone = '" . $phone . "', price= '" . $price . "' , description= '" . $description . "', place= '" . $place . "', image_Path= '" . $imagePath . "'where id='" . $id . "'";


    //create connection

    mysqli_query($con, $qry1);

    echo "<script>alert('Data updated successfully');
    window.location = 'admincardata.php';
    </script>";
}
?>