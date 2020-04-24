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
  <title>Help</title>
</head>
<body>
  <?php include '../inc/nav2.php'; ?>  
  <main class='bg-light min-vh-100 container-fluid pt-5'>
   <h1 class="text-center">Guide to use this app</h1>
   <div class="w-50 mx-auto">
    <p class="text-center py-4">Enter the assignment name and amount of question, then click start create.</p>
    <img class="mx-auto d-block w-100" src="help_instruction/enter_assignment1.JPG" alt="insctuction1">
    <img class="mx-auto d-block w-100" src="help_instruction/enter_assignment2.JPG" alt="insctuction2">
    <p class="text-center py-4">Click the drop down selector to choose question format, you can either choose fill-in blank or multiple choice. Please click send after fill in each question. When it comes with the very last question, please click finish. Remember, you have only one chance to click send button and save that qustion to database.</p>
    <img class="mx-auto d-block w-100" src="help_instruction/selection&wa.JPG" alt="insctuction3">
    <img class="mx-auto d-block w-100" src="help_instruction/example_wa.JPG" alt="insctuction4">
    <p class="text-center py-4">Multiple choice format and example shows below:</p>
    <img class="mx-auto d-block w-100" src="help_instruction/mc.JPG" alt="insctuction5">
    <img class="mx-auto d-block w-100" src="help_instruction/example_mc.JPG" alt="insctuction6">
    <p class="text-center py-4">After click finish, a button is appended on left side panel. You can click it and we will send a assignment copy to you, but you cannot update or delete any question.</p>
    <img class="mx-auto d-block w-100" src="help_instruction/review.JPG" alt="insctuction8">
    <p class="text-center py-4">Example of assignment copy shows below: </p>
    <img class="mx-auto d-block w-100" src="help_instruction/record.JPG" alt="insctuction9">
   </div>
  </main>
  
  <?php include '../inc/bjs.php'; ?>
</body>
</html>