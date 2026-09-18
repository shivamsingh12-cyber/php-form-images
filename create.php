<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
</head>

<body>
    <table border="1">
        <caption>Form Submission</caption>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <tbody>
                <tr>
                    <td>fName</td>
                    <td><input type="text" name="fName" id=""></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="Male" >Male
                        <input type="radio" name="gender" value="Female">Female
                    </td>
                </tr>
                <tr>
                    <td>Course</td>
                    <td><select name="course" id="">
                            <option value="MCA">MCA</option>
                            <option value="MCA">Btech</option>
                            <option value="MCA">M.sc</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <input type="checkbox" name="country" value="India">India
                        <input type="checkbox" name="country" value="Africa">Africa
                    </td>
                   
                </tr>
                <tr>
                    <td> <input type="submit" value="submit" name="submit"> </td>
                </tr>
            </tbody>
        </form>
    </table>

</body>
<?php

if (isset($_POST['submit'])) {
     if(isset($_FILES['image'])){
        $fileName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        move_uploaded_file($tmpName,"images/".$fileName);
    
    $name=$_POST['fName'];
    $gender=$_POST['gender'];
    $course=$_POST['course'];
    $country=$_POST['country'];
    $con=mysqli_connect('localhost','root','','test');
    if (!$con) {
        die('it is not Connected!');
    }
   
    $sql="INSERT into user values('null','$name','$gender','$course','$country','$fileName')";
    $query=mysqli_query($con,$sql);
    if($query){
        header('location:show_data.php');
    }
    else{
         echo "You haven't Submitted";
    }

}
}
?>

=======
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="fname" id=""></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><input type="number" name="age" id=""></td>
            </tr>
            <tr>
                <th>Course</th>
                <td>
                   <select name="course" id="">
                    <option value="">Select Course</option>
                    <option value="msc">MSC</option>
                    <option value="bsc">BSC</option>
                    <option value="csc">CSC</option>
                   </select>
                </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>
                   Male <input type="radio" name="gender" value="male">
                   Female <input type="radio" name="gender" value="female">
                </td>
            </tr>
            <tr>
                <th>City</th>
                <td>
                 Bengaluru   <input type="checkbox" name="city" value="bengaluru">
                   Himachal <input type="checkbox" name="city" value="himachal">
                </td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <input type="file" name="image" id="">
                </td>
            </tr>
            <tr>
                <th><input type="submit" value="submit" name="submit"></th>
               
            </tr>
        </table>
    </form>
    <?php
        include('connect.php');
        if(isset($_POST['submit'])){
            $name=$_POST['fname'];
            $age=$_POST['age'];
            $gender=$_POST['gender'];
            $course=$_POST['course'];
            $city=$_POST['city'];

            //image save
            $imagename=$_FILES['image']['name'];
            $tmpname=$_FILES['image']['tmp_name'];
            move_uploaded_file($tmpname,"images/".$imagename);

            $sql="insert into user values('null','$name','$age','$course','$gender','$city','$imagename')";
            $res=mysqli_query($con,$sql);
            if($res) header('location:showdata.php');
            else echo "your data is not saved";
        }
    ?>
</body>
>>>>>>> 1e64f8d (added new challenges)
</html>