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
        <!-- /.col-lg-6 -->
        <!-- <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div> -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>