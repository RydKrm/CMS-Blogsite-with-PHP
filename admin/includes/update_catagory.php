   <!-- <h2>Testing</h2> -->

          <form action="" method="post">
          <div class="form-group">
          <label for="cat_title">Update Catagories</label>

      <?php
    if(isset($_GET['edit'])){ 
      $edit_cat  = $_GET['edit'];
      $query = "SELECT * FROM catagories WHERE cat_id = $edit_cat"; //echo $query;
      $edit_query = mysqli_query($connection,$query);   //echo $edit_query;
         while($row = mysqli_fetch_assoc($edit_query)){
         // $row = mysqli_fetch_assoc($edit_query);
          $cat_id = $row['cat_id'];   ///echo "cat id ".$cat_id;
          $cat_title = $row['cat_title'];  //echo "cat title ".$cat_title;
         }
    ?>

    <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title"> 
        <?php } ?>

    <?php 
      if( isset($_POST['update_catagory'])){   // echo "<h1>update catagory</h1>";
        $the_cat_title = $_POST['cat_title'];
      $query = "UPDATE catagories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
      $update_catagory = mysqli_query($connection,$query);
     if($update_catagory) echo "<h1>UPDATE</h1>";
    //  if($connection) echo "<h1>Database Connected</h1>";
    //  if($query) echo "<h1>  query find</h1>";
       header("Location: catagories.php");
      }

    ?>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_catagory"value="Update Category ">
            </div>
        </form>