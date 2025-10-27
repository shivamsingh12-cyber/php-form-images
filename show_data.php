<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <table border="1">
    <caption>Show Data</caption>
    <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Course</th>
        <th>Country</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php
     $con=mysqli_connect('localhost','root','','test');
     $sql="select * from user";
     $query=mysqli_query($con,$sql);
    
     while ( $row=mysqli_fetch_assoc($query)) {
         echo "<tr>
    <td>".$row['fname']."</td>
    <td>".$row['gender']."</td>
    <td>".$row['course']."</td>
    <td>".$row['country']."</td>
    <td><img src='images/".$row['img']."' width='100' height='100'/></td>
    <td><a href='create.php'>Add</a> <a href='update.php?id=".$row['id']."'>Edit</a> <a href='del.php?id=".$row['id']."'>Delete</a></td>
    </tr>";
     }
  
    ?>

  
 
  </table>
</body>
</html>