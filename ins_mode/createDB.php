<?php include('../inc/connectDB.php'); ?>
<?php 
  if(isset($_POST['assignment_name'])){

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