<?php include "includes/db.php" ?>
<?php include "includes/web_header.php" ?>
 
<?php include "includes/web_navigation.php" ?>
<?php 
        $profile_id = $_SESSION['user_id'];
        $connection = mysqli_connect('localhost','root','','cms');
        $query = "SELECT * FROM user WHERE user_id = {$profile_id}";
        $select_user = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_user)){
            $user_name = $row['username'];
            $user_first_name = $row['user_first_name'];
            $user_last_name = $row['user_last_name'];
            $user_role= $row['user_role'];
            $user_email = $row['user_email'];
            $user_pic = $row['user_img'];
            $user_password = $row['user_password'];
        }
        ?>

<div class="container">
 <div class="profile-info">
   <div class="profile-img">
     <img src="img/profile03.jpg" class="img-responsive" alt="Image Not Found">
   </div> 
  <br>
  </div>


   <form action="" method="post" enctype="multipart/form-data">
   <b><h3>User Name : <?php echo $user_name ?></h3></b>
   <div class="form-group">
   <label for="change_name">Change User Name</label>
    <input type="text" name="change_name" class="form-control">
     </div>

     <b><h3>Profile Picture : <?php echo $user_pic ?></h3></b>
   <div class="form-group">
   <label for="post_image"">Change Profile Picture </label>
   <input type="file" name="post_image" >
     </div>

     <b><h3>First Name : <?php echo $user_first_name ?> </h3></b>
   <div class="form-group">
   <label for="change_name">Change first Name</label>
    <input type="text" name="change_first_name" class="form-control">
     </div>

     <b><h3>Last Name : <?php echo $user_last_name ?> </h3></b>
   <div class="form-group">
   <label for="change_name">Change last Name</label>
    <input type="text" name="change_last_name" class="form-control">
     </div>

     <b><h3> Email : <?php echo $user_email ?> </h3></b>
   <div class="form-group">
   <label for="change_name">Change Email</label>
    <input type="text" name="change_email" class="form-control">
     </div>
     <div class="form-group">
   <label for="change_name">Change Password</label>
    <input type="password" name="change_password" class="form-control">
     </div>
     <div class="form-group">
   <label for="change_name">Conform Password </label>
    <input type="password" name="conform_password" class="form-control">
     </div>
     <input type="submit" value="Update Profile" name="submit_update" class="btn btn-primary">
   </form>
   </div>

   <?php 
    if(isset($_POST['submit_update'])){
      $change_name = $_POST['change_name']; 
      if(strlen($change_name)<1) $change_name = $user_name;
      $change_first_name = $_POST['change_first_name'];
      if(strlen($change_first_name)<1) $change_first_name = $user_first_name;
      $change_last_name = $_POST['change_last_name'];
      if(strlen($change_last_name)<1) $change_last_name = $user_last_name;
      $change_email = $_POST['change_email'];
      if(strlen($change_email)<1) $change_email = $user_email;
      $the_user_id = $_SESSION['user_id']; 
    
    //  $post_img = $_FILES['post_img']['name'];
    //  $post_img_temp = $_FILES['post_img']['tmp_name'];
     // move_uploaded_file($post_img_temp,"image/$post_img");
      $post_img = 0;
      $change_password = $_POST['change_password'];
      $conform_password = $_POST['conform_password']; 

      if($change_password!=$conform_password) {
          echo "<h2>Password Don't Match</h2>";
      } else if (strlen($change_password)<6 && strlen($change_password)!=0) {
          echo "<h2>Password Must be 6 character </h2>";
      } else {
        if(strlen($change_password)==0) $change_password = $user_password;

     $query = "UPDATE user SET username='{$change_name}',user_img='{$post_img}',user_first_name=
     '{$change_first_name}',user_last_name='{$change_last_name}',
     user_email='{$change_email}',user_password='{$change_password}' WHERE user_id=$the_user_id";
      $update_profile = mysqli_query($connection,$query);
     //echo "<h2>Test change </h2>";
      // header("Location: profile.php");
      if(!$update_profile){
          echo "<h2> Profile Not Update</h2>";
      } 
    }
    
    }
   ?>




<?php include "includes/web_footer.php" ?>