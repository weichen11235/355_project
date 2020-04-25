<?php include('../inc/connectDB.php'); ?>
<?php
  session_start();
  $username = $_SESSION["username"];
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userId;
    $questionsetId;
    $innerContent ="";

    //get user id
    $sql = "SELECT user_id FROM appuser WHERE login = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $userId = $row['user_id'];
    }

    //get questionset id
    $title = $_POST["title"];
    $sql = "SELECT questionset_id FROM questionset WHERE title = '$title'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $questionsetId = $row['questionset_id'];
    } 

    $sql = "SELECT * FROM student_answers WHERE student_id = $userId AND questionset_id = '$questionsetId'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      //completed the assignment already
      $innerContent .= "<h1 class='text-center mt-5'>Assignment Completed</h1>";
      echo $innerContent;
      
    } 
    else{
      //get the questions, not yet complete 
      $sql = "SELECT content, answer, question_type FROM question WHERE title = '$title'";
      $result = $conn->query($sql);
      $innerContent = "<form class='w-50 mx-auto my-5'><h3 class='text-center'>$title</h3>";
      $test = "";
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          if($row['question_type'] === 'WA'){
            $content = $row['content'];
            $innerContent .= "<div class='form-group shadow p-3 mb-5'>
                                <p>$content</p>
                                <input type='text' name='answer' class='form-control mb-2' placeholder='enter the answer'>
                                <input type='button' value='Send' onclick='sendAnswer(this)' class='w-100'>
                              </div>";

          }else{
            $content = $row['content'];
            $indexA = strpos($content, "(a)");
            $indexB = strpos($content, "(b)");
            $indexC = strpos($content, "(c)");
            $question = substr($content, 0, $indexA);
            $choiceA = substr($content, $indexA, $indexB - $indexA);
            $choiceB = substr($content, $indexB, $indexC - $indexB);
            $choiceC = substr($content, $indexC);

            $innerContent .= "<div class='form-group shadow p-3 mb-5'>
                                <p>$question</p>
                                <div class='form-check w-100 mb-4'><label class='form-check-label'>
                                  <input type='radio' class='form-check-input' name='optradio' value='$choiceA'>$choiceA
                                </label></div>
                                <div class='form-check w-100 mb-4'><label class='form-check-label'>
                                  <input type='radio' class='form-check-input' name='optradio' value='$choiceB'>$choiceB
                                </label></div>
                                <div class='form-check w-100 mb-4'><label class='form-check-label'>
                                  <input type='radio' class='form-check-input' name='optradio' value='$choiceC'>$choiceC
                                </label></div>
                                <input type='button' value='Send' onclick='sendAnswer(this)' class='w-100'>
                              </div>";
          }
        }

        $innerContent .= "</form>";
        echo $innerContent;
        
      }else {
        echo "0 result";
      }
      
    }
    
  }

?>