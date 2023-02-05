<?php include "includes/db.php" ?>
<?php include "includes/web_header.php" ?>
 
<?php include "includes/web_navigation.php" ?>
 


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
              <?php 
               $post_id = $_GET['view_post_id'];
               $connection = mysqli_connect('localhost','root','','cms');
               $query = "SELECT * FROM posts WHERE post_id = $post_id";
               $show_post = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($show_post)){
                 $post_title = $row['post_title'];
                 $post_author = $row['post_author'];
                 $post_date = $row['post_date'];
                 $post_img = $row['post_image'];
                 $post_content = $row['post_content'];
                 $post_id = $row['post_id'];
              ?>


                <!-- Title -->
                <h1><?php echo $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/image/<?php echo $post_img ?>" alt="Image Not Found">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content ?></p>
                <hr>
                <!-- <input type="submit" value="See More" name="see_more" class="btn btn-primary"> -->
                <!-- <a href='view_all_post.php?delete={$post_id}'> <h3>See More</h3></a> -->
                 <!-- // echo "<td><a href='view_all_post.php?delete={$post_id}'> Delete</a></td>"; -->
                <!-- Blog Comments -->


               <?php } ?>
   
            <?php 
                $query = "SELECT * FROM posts WHERE post_id = $post_id";
               $show_post = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($show_post)){
                 $post_views = $row['post_views']+1;
                 $post_id = $row['post_id'];
               }
               $query = "UPDATE posts SET post_views = '{$post_views}' WHERE post_id = {$post_id}";
               $update_post_view = mysqli_query($connection,$query);

               if(!$update_post_view) echo "<h2> Views Not Increase </h2>";

              ?>
            



            <h2 class="text-center">Comments</h2>

               <?php 
            $comment_post_id = $_GET['view_post_id'];
            $query = "SELECT * FROM comments WHERE comment_post_id ={$comment_post_id} AND comment_status='Approve'";
            $show_comment = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($show_comment)){
                $comment_date = $row['comment_date'];
                $comment_contain = $row['comment_contain'];
                $comment_author = $row['comment_author'];
            
           
           ?>

              
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> <?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_contain; ?>
                        <?php echo "<hr>" ?>
                        </div>
                </div>
            <?php } ?> 
            <hr>




                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                    <!-- <div class="form_control">
                    <label for="comment_author">comment Author</label>
                    <input type="text" name="comment_author" class="form-control">
                    </div> -->
                        <div class="form-group">
                        <label for="comment_contain">Comment Contain</label>
                            <textarea name="comment_contain" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_comment">Submit</button>
                    </form>
                </div>

                <?php 
                 if(isset($_POST['add_comment'])){
                     $comment_post_id = $_GET['view_post_id'];
                     $comment_author = $_SESSION['username'];
                     $comment_contain = $_POST['comment_contain'];
                     $comment_status = "Approve";
                     $comment_date = date('d-m-y');
                     $comment_author_id = 10;
                     $query = "INSERT INTO comments(comment_post_id,comment_author,comment_date,
                     comment_contain,comment_status,comment_author_id) ";
                    $query .= " VALUES('{$comment_post_id}','{$comment_author}','{$comment_date}',
                    '{$comment_contain}','{$comment_status}','{$comment_author_id}')"; 

                    $connection = mysqli_connect('localhost','root','','cms');
                    if(!$connection) echo "<h1>Server Not Connected</h1>";    
                    $add_comment = mysqli_query($connection,$query);
                     if(!$add_comment) echo "<h1>Comment Not Submitted</h1>";     

                     header("Location: view_post.php?view_post_id= $post_id ");                       

                 }
                 
             
                
                ?>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

          
                <!-- Comment -->
                 <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        Nested Comment -->
                        <!-- <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>  -->
                        <!-- End Nested Comment -->
                    <!-- </div>
                </div>

              -->
            </div>

            <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- .input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                            <?php 
                        $query = "SELECT * FROM catagories";
                        $add_catagory = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($add_catagory)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                      
                            // echo "<td> <a href='catagories.php?delete={$cat_id}'>Delete</a></td>"; 
                            // echo "<td> <a href='catagories.php?edit={$cat_id}'>Edit</a></td>"; 
                            echo  "<li> <a href='catagory_post.php?catagory_id={$cat_id}'>  $cat_title</a></li>";
                           }
                           ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
