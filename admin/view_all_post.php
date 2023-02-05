<?php include "includes/admin_header.php" ?>
<?php ob_start() ?>
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
                            <small> What you do best </small>
                        </h1> 
                        </div>
                </div>
                      <table class="table table-bordered table-hover">
                      <thead>
                       <th>Post_id</th>
                       <th>catagory_id</th>
                       <th>Post_title</th>
                       <th>Post_author</th>
                       <th>Post_date</th>
                       <th>Post_img</th>
                       <th>Post_tags</th>
                       <th>Post_status</th>
                       <th>Edit</th>
                       <th>Delete</th>
                      </thead>
                      <tbody>
                       
                       <?php 
                       $connection = mysqli_connect('localhost','root','','cms');
                       $query = "SELECT * FROM posts";
                       $show_post = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_assoc($show_post)){
                          $post_id = $row['post_id'];
                          $post_catagory_id = $row['post_catagory_id'];
                          $post_title = $row['post_title'];
                          $post_author = $row['post_author'];
                          $post_date = $row['post_date'];
                          $post_img = $row['post_image'];
                          $post_tag = $row['post_tags'];
                          $post_status = $row['post_status'];

                         echo "<tr>";
                         echo "<td>$post_id</td>";
                         echo "<td>    $post_catagory_id</td>";
                         echo "<td>$post_title</td>";
                         echo "<td>$post_author</td>";
                         echo "<td>$post_date</td>";
                         echo "<td>$post_img</td>";
                         echo "<td>$post_tag</td>";
                         echo "<td>$post_status</td>";
                         echo "<td><a href='edit_post.php?edit={$post_id}'> Edit</a></td>";
                         echo "<td><a href='view_all_post.php?delete={$post_id}'> Delete</a></td>";
                         echo "</tr>";
                       }

                       if(isset($_GET['delete'])){
                          // echo "<h1>Delete post</h1>";
                       $post_id = $_GET['delete'];
                       $query = "DELETE FROM posts WHERE post_id = {$post_id}";
                       $delete_post = mysqli_query($connection,$query);
                       if(!$delete_post) echo "<h1>Post Not Deleted</h1>";
                       header("Location: view_all_post.php");
                       }
                       ?>


                      </tbody>
                      
                      </table>  
                      
                    <!-- <?php    
                    //  if(isset($_GET['edit'])){
                    //      $post_id = $_GET['edit'];
                    //      include "edit_post.php";
                    //    }
                       ?> -->

                    
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php" ?>     
