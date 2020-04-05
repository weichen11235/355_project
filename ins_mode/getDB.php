<?php include('../inc/connectDB.php'); ?>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $assignment_name = $_POST["assignment_name"];
    
    $sql = "SELECT * FROM $assignment_name";
    $result = $conn->query($sql);
    $content = "<form class='w-50 mx-auto my-5'><h3 class='text-center'>$assignment_name</h3>";

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        if($row['question_type'] === 'fill_in'){
          $qNumber = $row['questionID'];
          $question = $row['question'];
          $answer = $row['answer'];
          $score = $row['score'];
          $content .= "<div class='form-group shadow p-3 mb-5'>
                        <p>Question<span id='qID'>$qNumber</span></p>
                        <input type='text' name='question' class='form-control mb-2' value='$question'>
                        <input type='text' name='answer' class='form-control mb-2' value='$answer'>
                        <input type='text' name='answer' class='form-control mb-2' value='$score'>
                        <div class='d-flex justify-content-center'>
                          <input type='button' class='mb-2 mr-2' value='Resend' onclick='qUpdate(this)'>
                          <input type='button' class='mb-2' value='Delete' onclick='qDelete(this)'>
                        </div>
                      </div>";
        }
        else{
          $qNumber = $row['questionID'];
          $question = $row['question'];
          $answer = $row['answer'];
          $choiceA = $row['choiceA'];
          $choiceB = $row['choiceB'];
          $choiceC = $row['choiceC'];
          $choiceD = $row['choiceD'];
          $score = $row['score'];
          $content .= "<div class='form-group shadow p-3 mb-5'>
                        <p>Question<span id='qID'>$qNumber</span></p>
                        <input type='text' name='question' class='form-control mb-2' value='$question'>
                        <input type='text' name='question' class='form-control mb-2' value='$choiceA'>
                        <input type='text' name='question' class='form-control mb-2' value='$choiceB'>
                        <input type='text' name='question' class='form-control mb-2' value='$choiceC'>
                        <input type='text' name='question' class='form-control mb-2' value='$choiceD'>";
          if($answer === 'A'){
            $content .= '<select name="answer" class="form-control mb-2" id="">
                          <option>Which choice is correct</option>
                          <option value="A" selected>Choice A</option>
                          <option value="B">Choice B</option>
                          <option value="C">Choice C</option>
                          <option value="D">Choice D</option>
                        </select>';
          } elseif ($answer === 'B') {
            $content .= '<select name="answer" class="form-control mb-2" id="">
                          <option>Which choice is correct</option>
                          <option value="A">Choice A</option>
                          <option value="B" selected>Choice B</option>
                          <option value="C">Choice C</option>
                          <option value="D">Choice D</option>
                        </select>';
          } elseif ($answer === 'C') {
            $content .= '<select name="answer" class="form-control mb-2" id="">
                          <option>Which choice is correct</option>
                          <option value="A">Choice A</option>
                          <option value="B">Choice B</option>
                          <option value="C" selected>Choice C</option>
                          <option value="D">Choice D</option>
                        </select>';
          } else {
            $content .= '<select name="answer" class="form-control mb-2" id="">
                          <option>Which choice is correct</option>
                          <option value="A">Choice A</option>
                          <option value="B">Choice B</option>
                          <option value="C">Choice C</option>
                          <option value="D" selected>Choice D</option>
                        </select>';
          }
            $content .= "
            <input type='text' name='answer' class='form-control mb-2' value='$score'>
            <div class='d-flex justify-content-center'>
              <input type='button' class='mb-2 mr-2' value='Resend' onclick='qUpdate(this)'>
              <input type='button' class='mb-2' value='Delete' onclick='qDelete(this)'>
            </div>
          </div>";
        }
      }

      $content .= "<input type='button' value='Delete this assignment' class='w-100 btn btn-danger' id='deleteBtn' onclick='deleteAssignment(this)'></form>";
      echo $content;
    } else {
      echo "0 result";
    }
    
    $conn->close();
    
  }
?>
