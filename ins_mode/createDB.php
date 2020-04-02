<?php 
  if(isset($_POST['assignment_name'])){
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
    $sql = "CREATE TABLE $assignment_name (
      questionID int PRIMARY KEY AUTO_INCREMENT,
      question text,
      question_type varchar(255),
      choiceA text DEFAULT NULL,
      choiceB text DEFAULT NULL,
      choiceC text DEFAULT NULL,
      choiceD text DEFAULT NULL,
      answer text,
      score int DEFAULT 1
    )";

    if ($conn->query($sql) === TRUE) {
      echo "Table created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
  }
  
?>