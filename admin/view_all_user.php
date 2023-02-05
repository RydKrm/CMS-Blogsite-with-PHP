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
                       <th>User_id</th>
                       <th>User_name</th>
                       <th>Full Name</th>
                       <th>Email</th>
                       <th>User_Role</th>
                       <th>Admin</th>
                       <th>subscriber </th>
                       <th>Remove_user</th>
                      </thead>
                      <tbody>
                       
                       <?php 
                        //sob_start();
                       $connection = mysqli_connect('localhost','root','','cms');
                       $query = "SELECT * FROM user";
                       $show_user = mysqli_query($connection,$query);
                       while($row = mysqli_fetch_assoc($show_user)){
                          $user_id = $row['user_id'];
                          $user_name = $row['username'];
                          $full_name = $row['user_first_name'] ." ".$row['user_last_name'];
                          $user_email = $row['user_email'];
                          $user_role = $row['user_role'];
                        //   $comment_contain = $row['comment_contain'];
                        //   $comment_author_id = $row['comment_author_id'];
                        //   $comment_status = $row['comment_status'];
                        //   $post_img = $row['post_image'];
                        //   $post_tag = $row['post_tags'];
                        //   $post_comment_count = $row['post_comment_count'];
                        //   $post_status = $row['post_status'];

                         echo "<tr>";
                         echo "<td> $user_id</td>";
                         echo "<td> $user_name </td>";
                         echo "<td>$full_name </td>";
                         echo "<td> $user_email</td>";
                         echo "<td> $user_role</td>";

                         echo "<td><a href='view_all_user.php?admin={$user_id}'> Admin </a></td>";
                         echo "<td><a href='view_all_user.php?subscriber={$user_id}'> Subscriber </a></td>";
                         echo "<td><a href='view_all_user.php?remove={$user_id}'> Remove </a></td>";
                         echo "</tr>";
                       }

                       if(isset($_GET['admin'])){
                       $user_id = $_GET['admin'];
                       $status = "Admin";
                       $query = "UPDATE user SET user_role = '{$status}' WHERE users_id = {$user_id}";
                       $admin_status = mysqli_query($connection,$query);
                       
                       header("Location: view_all_user.php");
                       }

                       if(isset($_GET['subscriber'])){
                        $user_id = $_GET['subscriber'];
                        $status = "Subscriber";
                        $query = "UPDATE user SET user_role = '{$status}' WHERE users_id = {$user_id}";
                        $admin_status = mysqli_query($connection,$query);
                        header("Location: view_all_user.php");

                        }
                        if(isset($_GET['remove'])){
                            $comment_id = $_GET['remove'];
                            $query = "DELETE FROM user WHERE users_id = {$user_id}";
                            $admin_status = mysqli_query($connection,$query);
                            header("Location: view_all_user.php");
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
