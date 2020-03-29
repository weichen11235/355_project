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
        <div class="col-lg-3 min-vh-100 bg-secondary">
          <a href="#" class="text-white d-block text-center py-3 border-bottom border-white">Assignment 1</a>
        </div>

        <!-- assignment create panel -->
        <div class="col-lg-9 min-vh-100">
          <form method='POST' id='' action="" class="w-50 shadow mx-auto p-5 my-5">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero debitis commodi corporis!</p>
            <input type="text" name="" id="assignment-name" class="form-control mb-2" placeholder="enter the answer">
            <input type="submit" value="Submit" class="w-100">
          </form>
          <form method='POST' id='' action="" class="w-50 shadow mx-auto p-5 my-5">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero debitis commodi corporis!</p>
            <div class="form-check w-100 mb-4">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">Option 1
              </label>
            </div>
            <div class="form-check w-100 mb-4">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">Option 1
              </label>
            </div>
            <div class="form-check w-100 mb-4">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">Option 1
              </label>
            </div>
            <div class="form-check w-100 mb-4">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">Option 1
              </label>
            </div>
            <input type="submit" value="Submit" class="w-100">
          </form>
        </div>

      </div>
    </div>
  <?php include '../inc/bjs.php'; ?>
</body>
</html>