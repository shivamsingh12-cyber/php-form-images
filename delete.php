<?php
 include('connect.php');
 $id=($_GET['id']??0);
    if($id>0){
   $imageSql="select filename from user where id=$id";
   $imageExe=mysqli_query($con,$imageSql);
   $getImage=mysqli_fetch_assoc($imageExe);
   $oldImageName=$getImage['filename'];

            $sql="delete from user where id=$id";
            $res=mysqli_query($con,$sql);
            if($res){
              $imagePath=__DIR__."/images/".$oldImageName;
              if(!empty($oldImageName) && is_file($imagePath)){
                unlink($imagePath);
              }
            }
    header('location:showdata.php');
    }
       else {
        echo "<script>alert('no user found')</script>";
       }  
          

?>