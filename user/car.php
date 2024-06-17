<?php  session_start()
?>

<?php  
$server = "localhost";
$username = "root";
$password = "";
$database = "myproject";
$user_id=$_SESSION['user_id'];
//create connection
$con = mysqli_connect($server,$username,$password,$database);
$query = "SELECT b.*, d.*, r.*
          FROM book b
          JOIN signup d ON b.user_id = d.user_id
          JOIN car r ON b.id = r.id where b.user_id=$user_id";
$result = mysqli_query($con,$query);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>notitfication</title>
    <style type="text/css">
    .user-div{
    margin-left: 50vh;

}
.table{
    border-collapse:collapse;
    margin-left: 10%;
    text-align: center;
    background-color: white;
    margin-top: 10vh;

}
 tr th {

border: 1px solid black;
background-color: lightblue;
text-decoration: none;


}
tr th:hover{
    text-decoration: underline;
}
tr td{
    border: 1px solid black;
}
tr:nth-child(odd){
    background-color: #FFCCCB;
    }
    .bt{
        margin-top: 5px;
    }
</style>
 <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>




    <div class="user-container">

    <table class="user-div">
            <tr>
                
           <th><h4> Carid: </h4></th>
          <th> <h4>Carno: </h4></th>
          <th> <h5>Book_date </h5></th>
          <th> <h5>Place: </h5></th>
          <th> <h5>Email</h5></th>
          <th><h4>Photo:</h4></th>
          <th><h4>Status:</h4></th>
           <th>Action</a></th>
           
       </tr>
    
     <?php
    while($row = mysqli_fetch_assoc($result))
    {
    ?>
        
        
       <tr> 
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['no']; ?></td>
        <td><?php echo $row['book_date']; ?></td>
        <td><?php echo $row['place']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><img src="../<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 40px;"></td>
        <?php if($row['book_status']==0)
        {
            $status="pending";
        }
        elseif($row['book_status']==-1)
        {
            $status="Rejected";

         
        }
        else
        {
            $status="Accepted";
        }

        ?>
        <td><?php echo $status; ?></td>

        
        <?php 
       if ($row['book_status']==-1||$row['book_status']==1)
        {
           $Action="Cannot Delete";
       }
       else
       {
         $Action='<a href="delete.php? book_id='. $row['book_id'].'& car_id= '. $row['id'] .'">Delete</a>';
       }
          
       ?>
        
      <td><?php echo $Action; ?></td>

         
       </tr>
   <?php }
   ?>
         
       </table>
   

</body>
</html>