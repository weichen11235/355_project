<?php
  session_start();
  session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include '../inc/head.php'; ?>
    <title>Sign In</title>
  </head>
  <body>
    <?php include '../inc/nav.php'; ?>

    <!-- main body -->
    <main class="d-flex min-vh-100 bg-dark align-items-center justify-content-center flex-column">
      <h1 class="text-white mb-3">Sign in</h1>
      <form method="POST" action="" class="text-center">
        <input type="text" name="username" id="username" class="form-control mb-2" placeholder="enter username" pattern="\w{5,}" required>

        <input type="password" name="password" id="password" class="form-control mb-2" placeholder="enter password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9]{8,}" required>

        <?php include('../inc/connectDB.php'); ?>
        <?php

          // If POST then check submitted username and password
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            
            // Get values submitted from the form
            $username = $_POST["username"];
            $password = $_POST["password"];
                
            $sql = "SELECT login, pwd, user_type FROM appuser WHERE login='" . $conn->real_escape_string($username) . "'";
            $result = $conn->query($sql);
            if (!$result) {
                die("Error executing query: ($conn->errno) $conn->error");
            }
            elseif ($result->num_rows == 0) {
                echo "<p class='text-danger text-center'>Incorrect username or password.</p>";
            }
            else {
                $row = $result->fetch_assoc();

                // See if submitted password matches the hash stored in the appuser table    
                if (password_verify($password, $row["pwd"])) {
                  $_SESSION["username"] = $username;
                  $_SESSION["type"] = $row["user_type"];
                  if($row["user_type"] === "S"){
                    header("Location: ../stu_mode/index.php");
                  } else{
                    header("Location: ../ins_mode/index.php");
                  }

                  die;
                } 
                else {
                  echo "<p class='text-danger text-center'>Incorrect username or password.</p>";
                }
            }
          }
          ?>

        <input type="submit" value="submit" class="form-control mb-2">
        <a href="sign_up.php" class="text-white">sign up here</a>
      </form>
    </main>


    <?php include '../inc/bjs.php'; ?>
  </body>
</html>