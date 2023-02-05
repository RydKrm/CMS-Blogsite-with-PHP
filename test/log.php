<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
 <div class="from-control">
 <input type="text" name="first_name">
 <input type="submit" value="first_name" name="submit-data">
 </div>
 </form>

  <?php 
   if(isset($_POST['submit-data'])){
       header("Location: header.php");
   }



?>

</body>
</html>