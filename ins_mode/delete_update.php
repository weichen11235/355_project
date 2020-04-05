<?php include('../inc/connectDB.php'); ?>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['choiceC'])){
      $assignment_name = $_POST["assignment_name"];
      $qID = $_POST["qID"];
      $question = $_POST["question"];
      $choiceA = $_POST["choiceA"];
      $choiceB = $_POST["choiceB"];
      $choiceC = $_POST["choiceC"];
      $choiceD = $_POST["choiceD"];
      $answer = $_POST["answer"];
      $score = (int)$_POST["score"];

      $sql = "UPDATE $assignment_name 
              SET question = '$question', choiceA = '$choiceA', choiceB = '$choiceB', choiceC='$choiceC', choiceD = '$choiceD', answer = '$answer', score = $score
              WHERE questionID = $qID";
      if ($conn->query($sql) === TRUE) {
        echo "Rcord is updating successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
    } 
    elseif(isset($_POST['updateFillIn'])){
      $qID = $_POST["qID"];
      $assignment_name = $_POST["assignment_name"];
      $question = $_POST["question"];
      $answer = $_POST["answer"];
      $score = (int)$_POST["score"];
      $sql = "UPDATE $assignment_name 
              SET question = '$question', answer = '$answer', score = $score
              WHERE questionID = $qID";
      if ($conn->query($sql) === TRUE) {
        echo "Rcord is updating successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
    }
    else{
      $qID = $_POST["qID"];
      $assignment_name = $_POST["assignment_name"];

      $sql = "DELETE FROM $assignment_name
              WHERE questionID = '$qID'";
      if ($conn->query($sql) === TRUE) {
        echo "Rcord is deleting successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();
      
    }
      
  }

    
?>