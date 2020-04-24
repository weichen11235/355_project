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
  <title>Help</title>
</head>
<body>
  <?php include '../inc/nav2.php'; ?>  
  <main class='bg-light min-vh-100 container-fluid pt-5 overflow-auto'>
   <h1>Manual: How to use</h1>
  </main>
  
  <?php include '../inc/bjs.php'; ?>
</body>
</html>