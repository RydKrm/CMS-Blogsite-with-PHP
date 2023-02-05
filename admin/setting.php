<?php ob_start() ?>

<?php include "includes/admin_header.php" ?>
        <!-- Navigation -->
        <div id="wrapper">
<?php include "includes/admin_navigation.php" ?>   

<div id="page-wrapper">
 <div class="container-fluid">
 <form action="" method="post">
   <div class="form-group">
  <label for="web_name_change">Change Website Name</label>
  <input type="text" name="web_name_change" class="form-control">
  </div>
  <input type="submit" class="btn btn-primary" value="Name Change" name="name_change_submit" >
</form> 

<?php 
 if(isset($_POST['name_change_submit'])){
  $name_change = $_POST['web_name_change'];
  $name_length = strlen($name_change);
  if ($name_length<2){
          echo "<h2>Name is too short </h2>";
  } else {
     $_SESSION['web_name'] = $name_change;
     header("Location:../index.php");
  }
 }
 ?>
<br><br>


<form action="" method="post">
<div class="form-group">
  <label for="side_wall_header"> Update Site Wall Header </label>
  <input type="text" name="wall_header" class="form-control">
  </div>
   <div class="form-group">
  <label for="side_wall_text"> Update Site Wall Text </label>
  <input type="text" name="wall_text" class="form-control">
  </div>
  <input type="submit" class="btn btn-primary" value="Change Well" name="submit_wall_text" >
</form> 

<?php 
 if(isset($_POST['submit_wall_text'])){
  $wall_text = $_POST['wall_text'];
  $wall_header = $_POST['wall_header'];
  $text_length = strlen($wall_text);
  $text_header = strlen($wall_header);
  if ($text_length<20){
          echo "<h2>Text is too short </h2>";
  } else if ($text_header<10){
        echo "<h2>Header is too short </h2>";
} else {
     $_SESSION['wall_text'] = $wall_text;
     $_SESSION['wall_header'] = $wall_header;
     header("Location:../index.php");
  }
 }
 ?>





 </div>
</div> 


<?php include "includes/admin_footer.php" ?>     