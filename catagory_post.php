<?php include "includes/db.php" ?>
<?php include "includes/web_header.php" ?>
 
<?php include "includes/web_navigation.php" ?>


    <!-- Page Content -->
                 <!-- Comments Form -->
                <!-- <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> -->

                <hr>

                <!-- Posted Comments -->

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
                    </div>
                </div> -->

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
                        <!-- Nested Comment -->
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
                        </div> -->
                        <!-- End Nested Comment -->
                    <!-- </div>
                </div>

            </div> -->

  <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
              <?php 
               if(isset($_GET['page'])){
                $page = $_GET['page'];
            } else {
                $page = "";
            } 

            if($page==""||$page==1){
                 $pages = 1;
            }
            else {
                $pages = ($page*3)-3;
            }
            $the_cat_id = $_GET['catagory_id'];
            $post_query_count = "SELECT * FROM posts WHERE post_catagory_id = {$the_cat_id}";
            $count_number  = mysqli_query($connection,$post_query_count);
            $total_post = mysqli_num_rows($count_number);

            $count = ceil($total_post/3);
            $post_per_page = 3;


               $connection = mysqli_connect('localhost','root','','cms');
               $query = "SELECT * FROM posts WHERE post_catagory_id = {$the_cat_id}  LIMIT $pages,{$post_per_page}" ;
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
                <h1><a href="view_post.php?view_post_id=<?php echo $post_id ?>"><?php echo $post_title ?> </a></h1>

                <!-- Author -->
                <p class="lead"> by <a href="#"><?php echo $post_author ?></a>  </p>
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <!-- Preview Image -->
                <img class="img-responsive" src="admin/image/<?php echo $post_img ?>" alt="Image Not Found">
                
                <!-- Post Content -->
                <!-- <p class="lead"><?php echo $post_content ?></p> -->
                <!-- <input type="submit" value="See More" name="see_more" class="btn btn-primary"> -->
                 <h3><a href='view_post.php?view_post_id=<?php echo $post_id ?>' > See More</a></h3>
               
               <hr><hr>

               <?php } ?>
               
                <!-- Blog Comments -->
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
                    <!-- /.input-group -->
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
                <h4><?php $header = $_SESSION['wall_header']; echo "$header";  ?> </h4>
                    <p><?php $text = $_SESSION['wall_text']; echo "$text";  ?></p>  </div>

            </div>

        </div>
        <!-- /.row -->

        
        <ul class="pager">
            <?php 
              for($i=1;$i<=$count;$i++){
                echo "<li><a href='catagory_post.php?page={$i}&catagory_id={$the_cat_id}'> $i</a></li>";
              }
            
            ?>
           </ul>

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
