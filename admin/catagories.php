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
                            <small> Author </small>
                        </h1>
                          
                     <?php
                        $connection = mysqli_connect('localhost','root','','cms');
                        $query = "SELECT * FROM catagories";
                        $add_catagory = mysqli_query($connection ,$query);
                     ?>

                        <div class="col-xs-6">

                        <?php 
                      if(isset($_POST['submit'])){
                        //   echo "<h1>Hello</h1>";
                          $cat_title = $_POST['cat_title'];
                          if(empty($cat_title)){
                              echo "<h2>Field is Empty</h2>";
                          } else {
                            $query = "INSERT INTO catagories(cat_title)";
                            $query .= "VALUE('{$cat_title}')";
                            $create_catagory = mysqli_query($connection,$query);
                            if(!$create_catagory){
                                echo"<h1>Not Connected</h1>";
                            }
                          } 
                      }
                      // header("Location: catagories.php");
                     ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Catagories</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit"value="Add Category ">
                                </div>
                            </form>


                   


                            
                        </div>
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover" >
                             <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Catagory Title</th>
                                     <th>Delete</th>
                                     <th>Edit</th>
                                 </tr>
                             </thead>
                              <tbody>
                        <?php     
                
                        $query = "SELECT * FROM catagories";
                        $add_catagory = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($add_catagory)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<tr>";
                            echo "<td>{$cat_id}</td>";
                            echo "<td>{$cat_title}</td>";
                            echo "<td> <a href='catagories.php?delete={$cat_id}'>Delete</a></td>"; 
                            echo "<td> <a href='catagories.php?edit={$cat_id}'>Edit</a></td>"; 
                            echo "</tr>";
                           }
                      
                        if(isset($_GET['delete'])){
                        $the_cat_id = $_GET['delete'];
                        $connection = mysqli_connect('localhost','root','','cms');
                        $query = "DELETE  FROM catagories WHERE cat_id = {$the_cat_id}";
                        $delete_catagory = mysqli_query($connection,$query);
                       // echo "<h1>Value not sent</h1>";
                        header("Location: catagories.php");
                       // if($delete_catagory) echo "<h1> Connected</h1>";
                        }
                        // if($test) echo "<h1> Connected</h1>";

                        ?>

                        <?php 
                           if(isset($_GET['edit'])){ 
                              $cat_id = $_GET['edit'];
                              include "includes/update_catagory.php";
                             // header("Location: catagories.php");
                           }
                        ?>
                    
                    


                        
                              </tbody>

                          </table>

                        </div>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->

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
