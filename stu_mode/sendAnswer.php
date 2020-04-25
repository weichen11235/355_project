<?php include('../inc/connectDB.php'); ?>
<?php
  session_start();
  $username = $_SESSION["username"];

  if(isset($_POST['A'])){
    $question = $_POST['question'];
    $A = $_POST['A'];
    $B = $_POST['B'];
    $C = $_POST['C'];
    $content = $question . $A . $B . $C;
    $answer = substr($_POST['answer'], 3);
    $title = $_POST['title'];
    $userId;
    $questionId;
    $questionsetId;
    $sql = "SELECT user_id FROM appuser WHERE login = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $userId = $row['user_id'];
    }
    $sql = "SELECT questionset_id FROM questionset WHERE title = '$title'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $questionsetId = $row['questionset_id'];
    }
    $sql = "SELECT question_id FROM question WHERE content = '$content'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $questionId = $row['question_id'];
    }

    $sql = "INSERT INTO student_answers VALUES ('$userId', '$questionsetId', '$questionId', '$answer')";

    if ($conn->query($sql) === TRUE) {
      echo "student answer record is inserted successfully";
    } else {
      echo "Error creating student answer record: " . $conn->error;
    }
  } else{
    $content = $_POST['question'];
    $answer = $_POST['answer'];
    $title = $_POST['title'];
    $userId;
    $questionId;
    $questionsetId;

    $sql = "SELECT user_id FROM appuser WHERE login = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $userId = $row['user_id'];
    }
    $sql = "SELECT questionset_id FROM questionset WHERE title = '$title'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $questionsetId = $row['questionset_id'];
    }
    $sql = "SELECT question_id FROM question WHERE content = '$content'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $questionId = $row['question_id'];
    }

    $sql = "INSERT INTO student_answers VALUES ('$userId', '$questionsetId', '$questionId', '$answer')";

    if ($conn->query($sql) === TRUE) {
      echo "student answer record is inserted successfully";
    } else {
      echo "Error creating student answer record: " . $conn->error;
    }
    
  }
?>