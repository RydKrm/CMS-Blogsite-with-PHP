<?php include "includes/admin_header.php" ?>

        <!-- Navigation -->
<div id="wrapper">

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
                        
                   <?php
                   
                   $post_id = $_GET['edit'];
                   $connection = mysqli_connect('localhost','root','','cms');
                   $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
                   $edit_post = mysqli_query($connection,$query);
                   while($row = mysqli_fetch_assoc($edit_post)){
                      $post_id = $row['post_id'];
                      $post_catagory_id = $row['post_catagory_id'];
                      $post_title = $row['post_title'];
                      $post_author = $row['post_author'];
                      $post_date = $row['post_date'];
                      $post_img = $row['post_image'];
                      $post_tag = $row['post_tags'];
                      $post_comment_count = $row['post_comment_count'];
                      $post_status = $row['post_status'];
                      $post_content = $row['post_content'];
                   }
                   
                   
                   
                   ?>



<form action="" method="post" enctype="multipart/form-data"> 
 <div class="form-group">
 <label for="post_catagory_id">Post Catagory ID</label>
  <input value="<?php echo $post_catagory_id ?>" type="text" name="post_catagory_id" class="form-control">
 </div>
 <div class="form-group">
 <label for="post_title">Post title</label>
  <input type="text" value="<?php echo $post_title ?>" name="post_title" class="form-control">
 </div>
 <div class="form-group">
 <label for="post_author">Post Author</label>
  <input type="text" value="<?php echo $post_author ?>" name="post_author" class="form-control">
 </div>
 <div class="form-group">
 <label for="post_date">Date</label>
  <input type="text" value="<?php echo $post_date ?>" name="post_date" class="form-control">
 </div>
 <div class="form-group">
 <label for="post_image">Post Image</label>
  <input type="file"  name="post_image" >
 </div>
 <div class="form-group">
 <label for="post_content">Post Content</label>
  <input type="text"value="<?php echo $post_content ?>" name="post_content" class="form-control" row="20" col="30">
 </div>
 <div class="form-group">
 <label for="post_comment_count">Post comment count</label>
  <input type="text" value="<?php echo $post_comment_count ?>" name="post_comment_count" class="form-control">
 </div>
  <div class="form-group">
 <label for="post_tags">Post Tags</label>
  <input type="text" value="<?php echo $post_tag ?>" name="post_tags" class="form-control">
 </div>
 <div class="form-group">
 <label for="post_status">Post Status</label>
  <input type="text" value="<?php echo $post_status ?>" name="post_status" class="form-control">
 </div>
 <input type="submit" class="btn btn-primary" value="Update Post" name="update_post" >
  <!-- <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum recusandae sunt enim, officiis fugiat adipisci atque inventore placeat expedita. Consequuntur, quis sed. Labore ipsam debitis iusto dicta error veritatis in.</h1> -->

</form>

<?php

 if(isset($_POST['update_post'])){

   // $post_id = $_POST['post_id'];
    $post_catagory_id = $_POST['post_catagory_id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_date = date('d-m-y');
    $post_img = $_FILES['post_image']['name'];
    $post_img_temp = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tag = $_POST['post_tags'];
    $post_comment_count = $_POST['post_comment_count'];
    $post_status = $_POST['post_status'];
    $connection = mysqli_connect('localhost','root','','cms');
    if(!$connection) echo "<h1> Server Not Connected  </h1>";

    // $query = "INSERT INTO posts(post_catagory_id,post_title,post_author,post_date,post_image,
    //           post_content,post_tags,post_comment_count,post_status) ";
    // $query .= "VALUES('{$post_catagory_id}','{$post_title}','{$post_author}','{$post_date}',
    //         '{$post_img}','{$post_content}','{$post_tag}','{$post_comment_count}',
    //         '{$post_status}')";
    // $query .= "VALUES('{$post_catagory_id}','{$post_title}','{$post_author}','{$post_date}',
    //     '{$post_img}','{$post_content}','{$post_tag}','{$post_comment_count}','{$post_status}','{$post_user}',
    //           '{$post_view}')";

 $query = "UPDATE posts SET post_catagory_id={$post_catagory_id} WHERE post_id = $post_id";
//  $query .= "UPDATE posts SET title ={$post_title} WHERE post_id = $post_id";
//  $query .= "UPDATE posts SET post_author={$post_author} WHERE post_id = $post_id";
//  $query .= "UPDATE posts SET post_date={$post_date} WHERE post_id = $post_id";
//  $query .= "UPDATE posts SET post_image={$post_img} WHERE post_id = $post_id";
//  $query .= "UPDATE posts SET post_content ={$post_content} WHERE post_id = $post_id";
//  $query .= "UPDATE posts SET post_status ={$post_status} WHERE post_id = $post_id";


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
