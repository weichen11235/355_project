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
  <main class = 'bg-light min-vh-100 container-fluid pt-5'>
    <div class="w-50 mx-auto pb-5">
      <h1 class="text-center">Guide to use this app</h1>
      <p class="text-center py-4">If your professor didn't post an assignment, it will only show a button for getting the total grade of all assignments. If you didn't complete any assignment, it won't show the grade.</p>
      <img class="mx-auto d-block w-100" src="guide/grade.JPG" alt="insctuction1">
      <p class="text-center py-4">If your professor did post an assignment, it will show a button for each assignment. Just click it, the questions will show up on right side panel.</p>
      <img class="mx-auto d-block w-100" src="guide/assignment.JPG" alt="insctuction2">
      <p class="text-center py-4">Below shows an example of an assignment. Type in the answer or click the right one, then click send button. Remember, you only have one chance to answer.</p>
      <img class="mx-auto d-block w-100" src="guide/question_list.JPG" alt="insctuction3">
      <img class="mx-auto d-block w-100" src="guide/example.JPG" alt="insctuction4">
      <p class="text-center py-4">After you completed the assignment and click that assignment button again, it will display 'Assignment Completed'.</p>
      <img class="mx-auto d-block w-100" src="guide/complete.JPG" alt="insctuction5">
      <p class="text-center py-4">When you complete the assignment, click total grade button and get the grade.</p>
      <img class="mx-auto d-block w-100" src="guide/show_grade.JPG" alt="insctuction6">
    </div>
  </main>
  
  
  <?php include '../inc/bjs.php'; ?>
</body>
</html>