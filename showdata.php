<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
</head>
<body>
    <table>
        <caption><a href="create.php">Add user</a></caption>
        <thead>
                 <tr>
            <th>Sr.No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>City</th>
            <th>Course</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            include('connect.php');
            $sql="select * from user";
            $res=mysqli_query($con,$sql);
            $id=1;
            if(mysqli_num_rows($res)>0){
               while($row=mysqli_fetch_assoc($res)){
            ?>
            <tr>
                <td><?= $id++ ?></td>
                <td><?= $row['fname']; ?></td>
                <td><?= $row['age']; ?></td>
                <td><?= $row['gender']; ?></td>
                <td><?= $row['city']; ?></td>
                <td>
                    <?=
                ($row['course']=="msc"?"MSC":"").
                  ($row['course']=="csc"?"CSC":"").
                    ($row['course']=="bsc"?"BSC":"")
                 ?>
                 </td>
                <td><img src="images/<?= $row['filename']; ?>" alt="user_image" width="100" height="100"></td>
                <td><a href="update.php?id=<?= $row['id']; ?>">Update</a> <a href="delete.php?id=<?= $row['id']; ?>">Delete</a></td>
            </tr>
            <?php
               } 
  }
  else{
    
            ?>
            <tr>
                <td colspan="7">No user available</td>
            </tr>

            <?php
  }
            ?>
        </tbody>
   
    </table>
</body>
</html>