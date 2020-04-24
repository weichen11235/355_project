<?php include('../inc/connectDB.php'); ?>
<?php 
  if(isset($_POST['title'])){

    $title = $_POST["title"];
    $sql = "INSERT INTO questionset (title) VALUES('$title')";

    if ($conn->query($sql) === TRUE) {
      echo "new question set record is inserted successfully";
    } else {
      echo "Error inserting question set record: " . $conn->error;
    }
    
    $conn->close();
  } elseif(isset($_POST['choiceA'])) {
    $type = $_POST["type"];
    $score = (float)$_POST["score"];
    $A = $_POST["choiceA"];
    $B = $_POST["choiceB"];
    $C = $_POST["choiceC"];
    $answer = $_POST["answer"];
    $question = $_POST["question"]. "(a)" . $A . "(b)" . $B . "(c)" . $C;
    if($answer == "A"){
      $answer = $A;
    } elseif ($answer == "B") {
      $answer = $B;
    } else {
      $answer = $C;
    }

    $getTitle;
    $questionset_id;
    $sql = "SELECT * FROM questionset 
    order by questionset_id desc limit 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $getTitle = $row["title"];
      $questionset_id = $row["questionset_id"];
    }

    $sql = "INSERT INTO question (title,question_type,content,answer) 
    VALUES ('$getTitle','MC','$question','$answer')";
    if ($conn->query($sql) === TRUE) {
      echo "question record is inserted successfully";
    } else {
      echo "Error creating question record: " . $conn->error;
    }

    $question_id;
    $sql = "SELECT * FROM question 
    order by question_id desc limit 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $question_id = (int)$row["question_id"];
    }

    $sql = "INSERT INTO questionset_question 
    VALUES ('$questionset_id', '$question_id', '$score')";
    if ($conn->query($sql) === TRUE) {
      echo "question_set_question record is inserted successfully";
    } else {
      echo "Error creating question_set_question record: " . $conn->error;
    }
  } else {
    $type = $_POST["type"];
    $score = (float)$_POST["score"];
    $answer = $_POST["answer"];
    $question = $_POST["question"];

    $getTitle;
    $questionset_id;
    $sql = "SELECT * FROM questionset 
    order by questionset_id desc limit 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $getTitle = $row["title"];
      $questionset_id = $row["questionset_id"];
    }

    $sql = "INSERT INTO question (title,question_type,content,answer) 
    VALUES ('$getTitle','WA','$question','$answer')";
    if ($conn->query($sql) === TRUE) {
      echo "question record is inserted successfully";
    } else {
      echo "Error creating question record: " . $conn->error;
    }

    $question_id;
    $sql = "SELECT * FROM question 
    order by question_id desc limit 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $question_id = (int)$row["question_id"];
    }

    $sql = "INSERT INTO questionset_question 
    VALUES ('$questionset_id', '$question_id', '$score')";
    if ($conn->query($sql) === TRUE) {
      echo "question_set_question record is inserted successfully";
    } else {
      echo "Error creating question_set_question record: " . $conn->error;
    }
  }
  
?>