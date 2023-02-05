<?php include "includes/db.php" ?>
<?php include "includes/web_header.php" ?>
 
<?php  include "includes/web_navigation.php" ?>
<?php  //session_start() ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
        <br><br><br><br><br><br>
        <div id="login">
        <h3 class="text-center text-white pt-5">&nbsp;</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div  class="col-md-6 log-center">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-primary btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="registration.php" class="text-info info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

     <?php 
      if(isset($_POST['submit'])){
        $username = $_POST['username'];  
        $password = $_POST['password'];
        
        $connection = mysqli_connect('localhost','root','','cms');
          if(!$connection)  echo "<h1>Server Not Connected </h1>";

      $query = "SELECT * FROM user ";
       $login = mysqli_query($connection,$query);

       if(!$login) echo "<h1>Query Failed</h1>";

       $fg = 0;
       while($row = mysqli_fetch_assoc($login)){

         $the_username = $row['username'];
         $the_password = $row['user_password'];
         $user_id = $row['user_id'];
         if($username==$the_username && $password==$the_password){
             echo "<h1>You are connected</h1>";
             $fg=1;
             $_SESSION['username'] = $the_username;
             $_SESSION['user_id'] = $user_id;
             header("Location: index.php"); 
         }
           }
     
           if($fg==0 ) echo "<h1>You are not a member <br> please register</h1>";


      }
     
     

     ?>

           
     <h1><?php echo $_SESSION['username'] ?></h1>

      </div>
    </div>

        <!-- Footer -->
       
        <?php include "includes/web_footer.php" ?>