<?php include "includes/admin_header.php" ?>

        <!-- Navigation -->
<div id="wrapper">
<?php //session_start() ?>
<?php include "includes/admin_navigation.php" ?>        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wellcome to Admin Panel
                            <small> Do what, what you do best </small>
                        </h1> 
                        
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>`  
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->



<form action="" method="post" enctype="multipart/form-data"> 

 <!-- 
 
 
 </div> -->
  <!-- <h3>Select Catagory</h3> -->
 <div class="form-group">  
 <label for="post_catagory_id">Post Catagory ID</label>
  <select name="Select_catagory">
  <?php 
        $connection = mysqli_connect('localhost','root','','cms');
      $query = "SELECT * FROM catagories";
      $select_catagory = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($select_catagory)){
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
           echo "<option value='$cat_id'>$cat_title</option>";
         }
 ?>
 </select>
</div>
 <h2>Post Title</h2>
 <div class="form-group">
 <label for="post_title">Post title</label>
  <input type="text" name="post_title" class="form-control">
 </div>

 <!-- <div class="form-group">
 <label for="post_author">Post Author</label>
  <input type="text" name="post_author" class="form-control">
 </div> -->
 <div class="form-group">
 <label for="post_image">Post Image</label>
  <input type="file" name="post_image" >
 </div>
 <div class="form-group">
 <label for="post_content">Post Content</label>
  <input type="text" name="post_content" class="form-control">
 </div>
  <div class="form-group">
 <label for="post_tags">Post Tags</label>
  <input type="text" name="post_tags" class="form-control">
 </div>
 <div class="form-group">
 <label for="post_status">Post Status</label>
  <input type="text" name="post_status" class="form-control">
 </div>

<!-- Submit Button -->
 <input type="submit" class="btn btn-primary" value="Publish Post" name="add_post" >
  <!-- <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum recusandae sunt enim, officiis fugiat adipisci atque inventore placeat expedita. Consequuntur, quis sed. Labore ipsam debitis iusto dicta error veritatis in.</h1> -->

</form>

<?php

 if(isset($_POST['add_post'])){

   // $post_id = $_POST['post_id'];
    $post_catagory_id = $_POST['Select_catagory'];
    $post_title = $_POST['post_title'];
   // $post_author = $_POST['post_author'];
    $post_author = $_SESSION['username'];
    $post_date = date('d-m-y');

    $post_img = $_FILES['post_image']['name'];
    $post_img_temp = $_FILES['post_image']['tmp_name'];
    
    $post_content = $_POST['post_content'];
    $post_tag = $_POST['post_tags'];
    $post_status = $_POST['post_status'];
    $post_views = 0;
    $post_like = 0;
    $post_user_id = $_SESSION['user_id'];

    move_uploaded_file($post_img_temp,"image/$post_img");

    $connection = mysqli_connect('localhost','root','','cms');
    if(!$connection) echo "<h1> Server Not Connected  </h1>";

    $query = "INSERT INTO posts(post_catagory_id,post_title,post_author,post_date,post_image,
              post_content,post_tags,post_status,post_views,post_like,post_user_id) ";
    $query .= " VALUES('{$post_catagory_id}','{$post_title}','{$post_author}','{$post_date}',
            '{$post_img}','{$post_content}','{$post_tag}','{$post_status}','{$post_views}','{$post_like}',
            '{$post_user_id}')";

     $submit_post = mysqli_query($connection,$query);
     
     

  if(!$submit_post) echo "<h1>Post Not Submitted</h1>";

   }

 ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php" ?>     
