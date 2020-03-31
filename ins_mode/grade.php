<?php    

  session_start();
  if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    die;
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../inc/head.php'; ?>
  <title>Gradebook</title>
</head>
<body>
  <?php include '../inc/nav2.php'; ?>  

  
  
  <?php include '../inc/bjs.php'; ?>
</body>
</html>