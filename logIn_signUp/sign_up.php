<!doctype html>
<html lang="en">
  <head>
    <?php include '../inc/head.php'; ?>
    <title>Sign Up</title>
  </head>
  <body>
    <?php include '../inc/nav.php'; ?>

    <!-- main body -->
    <main class="d-flex min-vh-100 bg-dark align-items-center justify-content-center flex-column">
      <h1 class="text-white mb-3">Sign up</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post" class="text-center">
        <select class="form-control mb-2" id="sel1" name="title">
          <option>Student</option>
          <option>Instructor</option>
        </select>
        <input type="text" name="last_name" id="last_name" class="form-control mb-2" placeholder="enter last name" required>

        <input type="text" name="first_name" id="first_name_name" class="form-control mb-2" placeholder="enter first name" required>

        <input type="text" name="username" id="username" class="form-control mb-2" placeholder="create username" pattern="\w{5,}" title="at least 5 characters, numbers and letters only" required>

        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $last_name = $_POST['last_name'];
            $first_name = $_POST['first_name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $title = $_POST['title'];
            
            $servername = "localhost";
            $dbUsername = "root";
            $dbPassword = "Aa1005234677";
            $dbName = '355project';

            // Create connection
            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
            
            //Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "INSERT INTO users (LastName, FirstName, Title, Username, Password)
            VALUES ('$last_name', '$first_name', '$title', '$username', '$passwordHash')";
            
            if ($conn->query($sql)) {
              header('Location: sign_up_respond.php');
              die;
            }
            elseif ($conn->errno == 1062) {
              echo '<p class="text-danger text-center">username already exist</p>';
            }
            else {
                die("Error ($conn->errno) $conn->error");
            } 
            
            $conn->close();
          }
        ?>
        
        <input type="password" name="password" id="password" class="form-control mb-2" placeholder="create password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9]{8,}" title="at least 8 characters, must have 1 number, 1 uppercase, and 1 lowercase" required>

        <input type="submit" value="Submit" name="submit" class="form-control mb-2">
      </form>
    </main>


    <?php include '../inc/bjs.php'; ?>
  </body>
</html>