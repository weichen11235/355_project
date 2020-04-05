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
  <title>Assignment</title>
</head>
<body>
  <?php include '../inc/nav2.php'; ?>  

  <!-- assignment page -->
  <div class="container-fluid ">
      <div class="row">

        <!-- assignment list panel-->
        <div class="col-lg-3 vh-100 bg-secondary px-0 overflow-auto">
          <button type="button" class="btn btn-secondary d-block text-left w-100 p-3 rounded-0" onclick="getAssignment()">Assignment 1</button>
        </div>

        <!-- questions panel -->
        <div class="col-lg-9 vh-100 overflow-auto">
          <form method='post' id='' action="<? echo $_SERVER[PHP_SELF]; ?>" class="w-50 shadow mx-auto p-5 my-5">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero debitis commodi corporis!</p>
            <input type="text" name="" id="assignment-name" class="form-control mb-2" placeholder="enter the answer">
            <input type="button" value="Send" class="w-100">
          </form>
          <form method='POST' id='' action="<? echo $_SERVER[PHP_SELF]; ?>" class="w-50 shadow mx-auto p-5 my-5">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero debitis commodi corporis!</p>
            <div class="form-check w-100 mb-4">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">the correct answer is A
              </label>
            </div>
            <div class="form-check w-100 mb-4">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">the correct answer is B
              </label>
            </div>
            <div class="form-check w-100 mb-4">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">the correct answer is C
              </label>
            </div>
            <div class="form-check w-100 mb-4">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">the correct answer is D
              </label>
            </div>
            <input type="button" value="Send" class="w-100">
          </form>
        </div>

      </div>
    </div>
  <?php include '../inc/bjs.php'; ?>
</body>
</html>