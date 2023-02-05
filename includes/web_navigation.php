   <!-- Navigation -->
   <?php session_start() ?>

   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
         <a class="navbar-brand" href="index.php">  
    <?php  
      $web_name = $_SESSION['web_name'];
       echo  "$web_name ";
    ?>
       </a>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                 <?php 

                // $query = "SELECT * FROM catagories";
                // $result = mysqli_query($connection,$query);

                // while($row = mysqli_fetch_assoc($result)){
                //   $cat_title = $row['cat_title'];
                //   echo "<li>'<a href='#'>{$cat_title}</a> </li>";
                // }


                // 

                  $connection = mysqli_connect('localhost','root','','cms');
                   $query = "SELECT * FROM catagories";
                   $result = mysqli_query($connection,$query);
                   while($row = mysqli_fetch_assoc($result)){
                       $cat_title = $row['cat_title'];
                       $cat_id = $row['cat_id'];
                       echo  "<li> <a href='catagory_post.php?catagory_id={$cat_id}'>  $cat_title</a></li>";
                   }

                   $username = $_SESSION['username'];
                   $query = "SELECT * FROM user ";
                   $user_role_result= mysqli_query($connection,$query);

                  // if(!$user_role_result) echo "<h1>User Not Found</h1>";
                   $fg = 0;

                   while($row = mysqli_fetch_assoc($user_role_result)){
                    $user_role = $row['user_role']; 
                    $user_name = $row['username'];
                   //echo "<h1>For Checking </h1>";
                   if($user_role == "Admin" && $user_name==$username ){
                      echo "<li> <a href='admin'>Admin</a> </li> ";
                   break;
                     
                 
                   }
                }

                 

              ?> 
                
                
            <?php if($_SESSION['username']!=null){ ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                        <?php 
                //   if($_SESSION['username']==null)
                //  echo "Log in";
                //  else {
                //      ?>
                <?php  echo $_SESSION['username']; ?>
                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li> 

                 <?php }
                 else {
                 ?> 
                  <li>  <a href="login.php">Login</a> </li> 
                 <?php } ?>

                </ul> 
                  
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> 


    <!-- <br><br><br><br>
    <h1>
        <?php //echo $_SESSION['username'] ?>
    </h1> -->
    <hr> 