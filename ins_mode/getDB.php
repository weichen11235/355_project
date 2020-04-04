<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "Aa1005234677";
    $dbName = 'test';

    // Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $assignment_name = $_POST["assignment_name"];
    
    $sql = "SELECT * FROM $assignment_name";
    $result = $conn->query($sql);
    $content = "<form class='w-50 mx-auto mt-5'><h3 class='text-center'>$assignment_name</h3>";

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $question = $row['question'];
        $answer = $row['answer'];
        $content .= "<div class='form-group shadow p-3 mb-5'>
                      <input type='text' name='question' class='form-control mb-2' value='$question' disabled>
                      <input type='text' name='answer' class='form-control mb-2' value='$answer' disabled>
                    </div>";
      }
      $content .= "<input type='button' value='Delete this assignment' class='w-100 btn btn-danger' id='deleteBtn' onclick='deleteAssignment(this)'></form>";
      echo $content;
    } else {
      echo "0 result";
    }
    
    $conn->close();
    
  }
?>