<!doctype html>
<html lang="en">
  <head>
    <?php include '../inc/head.php'; ?>
    <title>Home</title>
  </head>
  <body>
    <?php include '../inc/nav.php'; ?>

    <!-- create assignment form -->
    <div class="container-fluid ">
      <div class="row">
        <div class="col-lg-3 min-vh-100 bg-light border border-secondary"></div>
        <div class="col-lg-9 min-vh-100">
          <form action="" class="w-50 shadow mx-auto p-5 mt-3">
            <input type="text" name="" id="assignment-name" class="form-control mb-2" placeholder="enter the name of assignment">
            <input type="number" name="" id="qNumber" class="form-control mb-2" placeholder="enter number of questions you want to create">
            <input type="button" value="Start Create" class="w-100" id="qCreate">
          </form>
        </div>
      </div>
    </div>
  
    <?php include '../inc/bjs.php'; ?>
    <script src="instr_assignment.js"></script>
  </body>
</html>