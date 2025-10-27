<?php
  $getid=$_GET['id'];
  $con=mysqli_connect('localhost','root','','test');
if (isset($_GET['id'])) {
$query="delete from user where id=".$getid;
$result=mysqli_query($con,$query);
if($result)
    header('location:show_data.php');
}
?>