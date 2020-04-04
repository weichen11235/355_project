<?php    
  session_start();
  if (!isset($_SESSION["username"])) {
    header("Location: ../logIn_signUp/sign_in.php");
    die;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include '../inc/head.php'; ?>
    <title>Home</title>
  </head>
  <body>
    <?php include '../inc/nav2.php'; ?>

    <!-- assignment page -->
    <div class="container-fluid">
      <div class="row">

        <!-- assignment list panel-->
        <div id='assignList' class="col-lg-3 vh-100 bg-secondary overflow-auto px-0">
          <button type="button" class="btn btn-secondary d-block text-left w-100 p-3 rounded-0" onclick="createAssignment()">Create New Assignment</button>
        </div>
        
        <!-- assignment create panel -->
        <div id="assignPanel" class="col-lg-9 vh-100 overflow-auto">
          <form  id='createForm' class="w-50 shadow mx-auto p-5 my-5">
            <input type="number" name="" id="qNumber" class="form-control mb-2" placeholder="enter number of questions you want to create">
            <input type="button" value="Start Create" class="w-100" id="createBtn" onclick="startCreate()">
          </form>
          <form  id='questionList' class='w-50 mx-auto'></form>
        </div>

      </div>
    </div>
    <?php include '../inc/bjs.php'; ?>
    <script src="table.js"></script>
    <script src="contentManipulate.js"></script>
    
  </body>
</html>