<!DOCTYPE html>
<<<<<<< HEAD
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


=======
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
</head>
<body>
      <?php
        include('connect.php');
         $id=($_GET['id']??0);
    if($id>0){
        $sql1="select * from user where id=$id";
        $res1=mysqli_query($con,$sql1);
        if(mysqli_num_rows($res1)>0){
        $user=mysqli_fetch_assoc($res1);
        ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="fname" value="<?= $user['fname'];?>"></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><input type="number" name="age" value="<?= $user['age'];?>"></td>
            </tr>
            <tr>
                <th>Course</th>
                <td>
                   <select name="course" id="">
                    <option value="">Select Course</option>
                    <option value="msc" <?= (($user['course'])=='msc')?"selected":"" ?> >MSC</option>
                    <option value="bsc" <?= (($user['course'])=='bsc')?"selected":"" ?> >BSC</option>
                    <option value="csc" <?= (($user['course'])=='csc')?"selected":"" ?> >CSC</option>
                   </select>
                </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>
                   Male <input type="radio" name="gender" value="male" <?= (($user['gender'])=='male')?"checked":"" ?> >
                   Female <input type="radio" name="gender" value="female" <?= (($user['gender'])=='female')?"checked":"" ?> >
                </td>
            </tr>
            <tr>
                <th>City</th>
                <td>
                 Bengaluru   <input type="checkbox" name="city" value="bengaluru" <?= (($user['city'])=='bengaluru')?"checked":"" ?> >
                   Himachal <input type="checkbox" name="city" value="himachal" <?= (($user['city'])=='himachal')?"checked":"" ?> >
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
    }
    else{
        echo "Invalid User id";
    }
     } else{
        echo "Enter Correct ID";
    }
        if(isset($_POST['submit'])){
            $name=$_POST['fname'];
            $age=$_POST['age'];
            $gender=$_POST['gender'];
            $course=$_POST['course'];
            $city=$_POST['city'];

            if(!empty($_FILES['image']['name'])){
                $oldSql="select filename from user where id='$id'";
                $oldres=mysqli_query($con,$oldSql);
                $getOldimage=mysqli_fetch_assoc($oldres);
                $oldImage=$getOldimage['filename'];
                $imagePath=__DIR__."/images/".$oldImage;
                     //image save
            $imagename=$_FILES['image']['name'];
            $tmpname=$_FILES['image']['tmp_name'];
            move_uploaded_file($tmpname,"images/".$imagename);
            $sql="update user set fname='$name',age='$age',city='$city',course='$course',gender='$gender',city='$city',filename='$imagename' where id='$id'";
            
                if(!empty($getOldimage) && is_file($imagePath)){
                    unlink($imagePath);
                }
            
            }
           else{
        $sql="update user set fname='$name',age='$age',city='$city',course='$course',gender='$gender',city='$city' where id='$id'";
           }

            
            $res=mysqli_query($con,$sql);
            if($res) header('location:showdata.php');
            else echo "your data is not saved";
        }
    ?>
</body>
>>>>>>> 1e64f8d (added new challenges)
</html>