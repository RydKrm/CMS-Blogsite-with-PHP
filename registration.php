<?php include "includes/db.php" ?>
<?php include "includes/web_header.php" ?>
 
 <?php  include "includes/web_navigation.php" ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up for Bootsnipp <small>It's free!</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="" method="post">
			    			<div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12"> 
                                 <div class="form-group">
                                <input type="text" name="user_name" placeholder="User Name" class="form-control">
                                </div>
                               </div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
			    					</div>
			    				</div>
                            </div>
							<div class="form-group">
								<label for="profile-image">Profile Image</label>
								<input type="file" name="profile-image" >
								</div>
                            

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>
							

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirm" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" name="submit" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
        </div>
    </div>


      <?php 
        if(isset($_POST['submit'])){
           $user_name = $_POST['user_name'];
           $first_name = $_POST['first_name'];
           $last_name = $_POST['last_name'];
		   $email = $_POST['email'];
           $password = $_POST['password'];
		   $confirm_password = $_POST['password_confirm'];
		   $user_role = 'Subscriber';
           $connection = mysqli_connect('localhost','root','','cms');
           $query = "INSERT INTO user(username,user_first_name,user_last_name,user_password,user_email,user_role) ";
           $query .= " VALUES('{$user_name}','{$first_name}','{$last_name}','{$password}','{$email}','{$user_role}')";

		   $add_user = mysqli_query($connection,$query);
		   
		   if($password !== $confirm_password){
			   echo "<h1>Password Not match </h1>";
		   }
     
     

  if(!$add_user) echo "<h1>User Not Added !!</h1>";
	  echo "<h1>You are member now</h1>";
	  header("Location: registration.php");
  

        }
      
      
      
      ?>


        <!-- Footer -->
       
        <?php include "includes/web_footer.php" ?>