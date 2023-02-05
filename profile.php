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
        }
        ?>

<div class="container">
 <div class="profile-info">
   <div class="profile-img">
     <img src="img/profile11.jpg" class="img-responsive" alt="Image Not Found">
   </div>
   <div class="">
   <b><h2><?php echo $user_name ?></h2></b>
   </div>
   <div class="profile">
   <div class="row">
   <?php 
       $profile_id = $_SESSION['user_id'];
       $query = "SELECT * FROM posts WHERE post_user_id={$profile_id}";
       $select_user = mysqli_query($connection,$query);
       $total_view = 0;
       $total_post = 0;
       while($row=mysqli_fetch_assoc($select_user)){
           $post_view = $row['post_views'];
           $total_view += $post_view;
           $total_post++;
       }

      ?>
    <div class="col-md-4">
      <p> Full Name</p> <p><?php echo $user_first_name." ".$user_last_name ?></p>
      <p> Role</p> <p><?php echo $user_role ?></p>
      <!-- <p>Rank</p> <p>12</p> -->
      <p>Total Post</p><b><p><?php echo $total_post ?></p></b>
    </div>
    <div class="col-md-4">
      <p>Email</p><p><?php echo $user_email ?></p>
      <p>Total View</p> <b><p><?php echo $total_view ?></p></b>
      <p>Read post</p> <b><p> <?php echo $total_post ?> </p></b>
    </div>

   </div>
   
  <div class="edit-profile">
     <a href="edit_profile.php"> Edit Profile </a>
  </div>

   </div>
 </div>
</div>

 <h3 class="text-center"> User All Posts</h3>

           <div class="user_all_post">
        
                <!-- Blog Post -->
              <?php 
               $profile_id = $_SESSION['user_id'];
               $connection = mysqli_connect('localhost','root','','cms');
               $query = "SELECT * FROM posts WHERE post_user_id= {$profile_id}";
               $show_post = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($show_post)){
                 $post_title = $row['post_title'];
                 $post_author = $row['post_author'];
                 $post_date = $row['post_date'];
                 $post_img = $row['post_image'];
                 $post_content = $row['post_content'];
                 $post_id = $row['post_id'];
              ?>

             <div class="container">
           
                <!-- Title -->
                <h1><a href="view_post.php?view_post_id=<?php echo $post_id ?>"><?php echo $post_title ?> </a></h1>

                <!-- Author -->
                <p class="lead"> by <a href="#"><?php echo $post_author ?></a>  </p>
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <!-- Preview Image -->
                <img class="img-responsive profile-post-pic" src="admin/image/<?php echo $post_img ?>" alt="Image Not Found">
                
                <!-- Post Content -->
                <!-- <p class="lead"><?php echo $post_content ?></p> -->
                <!-- <input type="submit" value="See More" name="see_more" class="btn btn-primary"> -->
                 <h3><a href='view_post.php?view_post_id=<?php echo $post_id ?>' > See More</a></h3>
               
               <hr><hr>
               </div>

               <?php } ?>
               
                <!-- Blog Comments -->
                </div>

           </div>            <!-- Blog Comments -->
               

           </div>
 </div>




<?php include "includes/web_footer.php" ?>