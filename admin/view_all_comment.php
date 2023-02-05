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
                            <small> What you do best </small>
                        </h1> 
                        </div>
                </div>
                      <table class="table table-bordered table-hover">
                      <thead>
                       <th>Comment_id</th>
                       <th>Post_id</th>
                       <th>Author</th>
                       <th>Date</th>
                       <th>Contain</th>
                       <th>Status</th>
                       <th>Auther_id</th>
                       <th>Approve</th>
                       <th>Unapprove</th>
                       <th>Delete</th>
                      </thead>
                      <tbody>
                       
                       <?php 
                       $connection = mysqli_connect('localhost','root','','cms');
                       $query = "SELECT * FROM comments";
                       $show_comment = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_assoc($show_comment)){
                          $comment_id = $row['comment_id'];
                          $comment_post_id = $row['comment_post_id'];
                          $comment_author = $row['comment_author'];
                          $comment_date = $row['comment_date'];
                          $comment_contain = $row['comment_contain'];
                          $comment_author_id = $row['comment_author_id'];
                          $comment_status = $row['comment_status'];

                        //   $post_img = $row['post_image'];
                        //   $post_tag = $row['post_tags'];
                        //   $post_comment_count = $row['post_comment_count'];
                        //   $post_status = $row['post_status'];

                         echo "<tr>";
                         echo "<td>$comment_id</td>";
                         echo "<td>$comment_post_id</td>";
                         echo "<td>$comment_author</td>";
                         echo "<td> $comment_date</td>";
                         echo "<td>$comment_contain</td>";
                         echo "<td>$comment_status</td>";
                         echo "<td>$comment_author_id</td>";
                         
                        //  echo "<td>$post_img</td>";
                        //  echo "<td>$post_tag</td>";
                        //  echo "<td>$post_comment_count</td>";
                        //  echo "<td>$post_status</td>";
                         echo "<td><a href='view_all_comment.php?approve={$comment_id}'> Approve </a></td>";
                         echo "<td><a href='view_all_comment.php?unapprove={$comment_id}'> Unaprove </a></td>";
                         echo "<td><a href='view_all_comment.php?delete={$comment_id}'> Delete </a></td>";
                         echo "</tr>";
                       }

                       if(isset($_GET['delete'])){
                       $comment_id = $_GET['delete'];
                       $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
                       $delete_comment = mysqli_query($connection,$query);
                       if(!$delete_comment) echo "<h1>Comment Not Deleted</h1>";
                       }

                       if(isset($_GET['approve'])){
                     $comment_id = $_GET['approve'];
                     $status = "Approve";
                     $query = "UPDATE comments SET comment_status='{$status}' WHERE comment_id = {$comment_id}";
                    // $query = "UPDATE catagories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                     $approve_post = mysqli_query($connection,$query);
                     if(!$approve_post) echo "<h1>Post Not approveed</h1>";
                     }

                     if(isset($_GET['unapprove'])){
                        $comment_id = $_GET['unapprove'];
                         $status = "Unapprove";
                        $query = "UPDATE comments SET comment_status='{$status}' WHERE comment_id = {$comment_id}";
                        $unapprove_post = mysqli_query($connection,$query);
                        if(!$unapprove_post) echo "<h1>Post Not unapproveed</h1>";
                        }
                       ?>

                      </tbody>
                      
                      </table>  
                               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php" ?>     
