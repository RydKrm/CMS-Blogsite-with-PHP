<?php include "includes/db.php" ?>
<?php include "includes/web_header.php" ?>
<?php include "includes/web_navigation.php" ?>
<?php // session_start() ?>

<hr><hr><br>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
     <!-- Blog Entries Column -->
            <div class="col-md-8">
        <!-- Blog card  -->
         <h2 class="text-center">All Post </h2> <br>
       <div class="card-container">
        <div class="row">
          
    <!-- Post show php  -->
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
          $pages = ($page*9)-9;
      }
      $post_query_count = "SELECT * FROM posts ";
      $count_number  = mysqli_query($connection,$post_query_count);
      $total_post = mysqli_num_rows($count_number);
      $count = ceil($total_post/9);
      $post_per_page = 9;
    


           $query = "SELECT * FROM posts LIMIT $pages,{$post_per_page}";
           $select_post = mysqli_query($connection,$query);
           while($row = mysqli_fetch_assoc($select_post)){
             $post_title = $row['post_title'];
             $post_content= substr($row['post_content'],0,50);
             $post_image = $row['post_image'];
             $post_id = $row['post_id'];
             $post_view = $row['post_views'];
             $post_like = $row['post_like'];
        ?>


          <div class="col-md-4">
      <!-- card start  -->
          <div class="card" >
          <img  src='admin/image/<?php echo $post_image ?>' style="width: 226px; height: 112px;" class="img-responsive card-img-top index-post-img" alt="...">
          <div class="card-body">
            <h3 class="card-title"><?php echo $post_title ?></h3>
            <p class="card-text"><?php echo $post_content ?></p>
            <a href="view_post.php?view_post_id=<?php echo $post_id ?>" class="btn btn-primary"  >See more</a>
          <div class="post-info">
             <div class="post-view">
              <h5>View </h5>
              <b><p><?php echo $post_view ?></p></b>
             </div>
             <div class="post-like">
              <h5><a href='index.php?like=<?php echo $post_id ?>'> Like</a> </h5>
              <!-- <a href='edit_post.php?edit={$post_id}'> Edit</a> -->
              <b> <p><?php echo $post_like ?></p></b>
             </div>
  
     <!-- Comment count php -->
      <?php
        $query = "SELECT *FROM comments WHERE comment_post_id = {$post_id}";
        $all_comment = mysqli_query($connection,$query);
        $total_comment = 0;
        while($row = mysqli_fetch_assoc($all_comment)){
          $total_comment++;
        }
      
      ?>

             <div class="post-comment">
              <h5><a href="view_post.php?view_post_id=<?php echo $post_id ?>">Comment </a> </h5>
             <b>  <p><?php echo $total_comment ?></p></b>
             </div>
          </div>
          </div>
        </div>
     </div>
          <!-- card end -->
           <?php } ?>

   

            <!-- Like Count php -->
           <?php 
           if(isset($_GET['like'])){
               $post_id = $_GET['like'];
              // echo "<h1>lorem ipsum for demo post user id</h1>";
                $query = "SELECT * FROM posts WHERE post_id = $post_id";
               $show_post = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($show_post)){
                 $post_like= $row['post_like']+1;
                
               }
               $query = "UPDATE posts SET post_like = '{$post_like}' WHERE post_id = {$post_id}";
               $update_post_like = mysqli_query($connection,$query);
               if(!$update_post_like) echo "<h2> Views Not Increase </h2>";
               header("Location: index.php");
              // header("Location: view_all_post.php");
              }
              ?>

          </div>
        </div>

       </div>

  

            <!-- Blog Sidebar Widgets Column -->
          
            <?php include "includes/web_sidebar.php" ?>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4><?php $header = $_SESSION['wall_header']; echo "$header";  ?> </h4>
                    <p><?php $text = $_SESSION['wall_text']; echo "$text";  ?></p>
                </div>
                </div>
            </div>
            <ul class="pager">
            <?php 
              for($i=1;$i<=$count;$i++){
                echo "<li><a href='index.php?page={$i}'> $i</a></li>";
              }
            
            ?>
           </ul>
      
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/web_footer.php" ?>