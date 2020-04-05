<?php include('../inc/connectDB.php'); ?>
<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    if($_POST['type'] === "fill_in"){

      $assignment_name = $_POST["assignment_name"];
      $question = $_POST["question"];
      $answer = $_POST["answer"];
      $type = $_POST["type"];
      $score = (int)$_POST["score"];
      
      $sql = "INSERT INTO $assignment_name (question, question_type, answer, score)
              VALUES ('$question', '$type', '$answer', $score)";
      if ($conn->query($sql) === TRUE) {
        echo "Rcord is inserted successfully";
      } else {
        echo "Error creating record: " . $conn->error;
      }
      
      $conn->close();
    }

    else{
      $assignment_name = $_POST["assignment_name"];
      $question = $_POST["question"];
      $choiceA = $_POST["choiceA"];
      $choiceB = $_POST["choiceB"];
      $choiceC = $_POST["choiceC"];
      $choiceD = $_POST["choiceD"];
      $answer = $_POST["answer"];
      $type = $_POST["type"];
      $score = (int)$_POST["score"];

      $sql = "INSERT INTO $assignment_name (question, question_type, choiceA, choiceB, choiceC, choiceD, answer, score)
              VALUES ('$question', '$type', '$choiceA', '$choiceB', '$choiceC', '$choiceD', '$answer', $score)";
      if ($conn->query($sql) === TRUE) {
        echo "Rcord is inserted successfully";
      } else {
        echo "Error creating record: " . $conn->error;
      }
      
      $conn->close();
    }

  }
?>