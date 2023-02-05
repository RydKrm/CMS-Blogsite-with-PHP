<?php include "includes/db.php" ?>
<?php include "includes/web_header.php" ?>
<?php session_start() ?>
  
<?php  $_SESSION['username'] = null; 
header("Location: index.php");
echo $_SESSION['username']; 

?> 


<h1>LOGOUT</h1>


<br><br><br><br>
    <h1>
        <?php echo $_SESSION['username'] ?>
    </h1>



<?php include "includes/web_footer.php" ?>