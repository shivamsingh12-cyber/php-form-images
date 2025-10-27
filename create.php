<!DOCTYPE html>
<html lang="en">

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

</html>