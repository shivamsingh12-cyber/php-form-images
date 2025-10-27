<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Create Data</title>
</head>

<body>
    <?php
$getid=$_GET['id'];
$con=mysqli_connect('localhost','root','','test');
if (isset($_GET['id'])) {
    $query="select * from user where id=".$_GET['id'];
    $mysql=mysqli_query($con,$query);
    
    while ($row=mysqli_fetch_assoc($mysql)) {
      
    echo '
 <table border="1">
        <caption>Form Submission</caption>
        <form action=update.php?id='.$_GET['id'].' method="post">
            <tbody>
                <tr>
                    <td>fName</td>
                    <td><input type="text" name="fName" value='.$row['fname'].' ></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="Male"'.(($row['gender']=="Male")?"checked":"").'>Male
                        <input type="radio" name="gender" value="Female"'.(($row['gender']=="Female")?"checked":"").'>Female
                    </td>
                </tr>
                <tr>
                    <td>Course</td>
                    <td><select name="course" >
                            <option value="MCA" '.(($row['course']=="MCA")?"selected":"").'>MCA</option>
                            <option value="Btech" '.(($row['course']=="Btech")?"selected":"").'>Btech</option>
                            <option value="MSC" '.(($row['course']=="MSC")?"selected":"").'>M.sc</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <input type="checkbox" name="country" value="India" '.(($row['country']=="India")?"checked":"").'>India
                        <input type="checkbox" name="country" value="Africa" '.(($row['country']=="Africa")?"checked":"").'>Africa
                    </td>
                   
                </tr>
                <tr>
                    <td> <input type="submit" value="submit" name="submit"> </td>
                </tr>
            </tbody>
        </form>
    </table>';
    }

}
?>
   <?php
   if (isset($_POST['submit'])) {
    $name=$_POST['fName'];
    $gender=$_POST['gender'];
    $course=$_POST['course'];
    $country=$_POST['country'];
    $query="UPDATE user SET fname = '$name', gender = '$gender',course='$course',country='$country' WHERE id=$getid";
    $result=mysqli_query($con,$query);
    if ($result) {
        header('Location:show_data.php');
    }
   }

   ?>

</body>


</html>