<?php include "includes/admin_header.php" ?>

        <!-- Navigation -->

        <div id="wrapper">
<?php include "includes/admin_navigation.php" ?>        

        <div id="page-wrapper">

            <div class="container-fluid">

    <?php
      $connection = mysqli_connect('localhost','root','','cms');
      if(!$connection) echo "<h1>Not Connected</h1>";

      $query = "SELECT * FROM user";
      $all_user = mysqli_query($connection,$query);
      $total_user = mysqli_num_rows($all_user);

      $query = "SELECT * FROM posts";
      $all_post = mysqli_query($connection,$query);
      $total_post = mysqli_num_rows($all_post);

      $query = "SELECT * FROM comments";
      $all_comment = mysqli_query($connection,$query);
      $total_comment = mysqli_num_rows($all_comment);

      $query = "SELECT * FROM user";
      $all_comment = mysqli_query($connection,$query);
      $total_author = 0;
      $total_subscriber = 0;
      $total_admin = 0;
      while($row = mysqli_fetch_assoc($all_comment)){
          $user_role = $row['user_role'];
          if($user_role == 'Admin') $total_admin++;
          else if($user_role == 'Subscriber') $total_subscriber++;
          else $total_author++;

      }

      $query = "SELECT * FROM posts";
      $all_post = mysqli_query($connection,$query);
      $total_view = 0;
      $total_like = 0;
      while($row = mysqli_fetch_assoc($all_post)){
          $number_of_views = $row['post_views'];
          $number_of_like = $row['post_like'];
          $total_view += $number_of_views;
          $total_like += $number_of_like;
      }

    
    ?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wellcome to Admin Panel
                            <small> Do what, what you do best </small>
                        </h1> 
                        <div class="container">
                          <div class="row">
                            <div class="col-md-3">
                              <h2>Total Post</h2> 
                              <?php echo "<h3>$total_post</h3>" ?>
                            </div>
                            <div class="col-md-3">
                              <h2> User</h2>
                             <?php echo "<h3>$total_user</h3>" ?>
                            </div>
                            <div class="col-md-3">
                              <h2> Like</h2>
                              <?php echo "<h3>$total_like</h3>" ?>
                            </div>
                            <div class="col-md-3">
                              <h2> Comment </h2>
                              <?php echo "<h3>$total_comment</h3>" ?>
                            </div>
                            <div class="col-md-3">
                              <h2> View</h2>
                              <?php echo "<h3>$total_view</h3>" ?>
                            </div>
                            <div class="col-md-3">
                              <h2>Aurthor  </h2>
                              <?php echo "<h3>$total_author</h3>" ?>
                            </div>
                            <div class="col-md-3">
                              <h2>Subscriber</h2>
                              <?php echo "<h3>$total_subscriber</h3>" ?>
                            </div>
                            <div class="col-md-3">
                              <h2>Admin </h2>
                              <?php echo "<h3>$total_admin</h3>" ?>
                            </div>
                          </div>
                       
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
