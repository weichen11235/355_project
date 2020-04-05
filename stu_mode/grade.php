<?php    

  session_start();
  if (!isset($_SESSION["username"])) {
    header("Location: ../logIn_signUp/sign_in.php");
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
  <main class = "pt-5 text-center min-vh-100 bg-dark text-white">
    <h4><span>Assignment 1:</span> 80/100</h4>
    <h4><span>Assignment 2:</span> 85/100</h4>
    <h4><span>Assignment 3:</span> 88/100</h4>
  </main>
  
  
  <?php include '../inc/bjs.php'; ?>
</body>
</html>