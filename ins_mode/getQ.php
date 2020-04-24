<?php include('../inc/connectDB.php'); ?>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $title = $_POST["title"];
    
    $sql = "SELECT * FROM question WHERE title = '$title'";
    $result = $conn->query($sql);
    $innerContent = "<form class='w-50 mx-auto my-5'><h3 class='text-center'>$title</h3>";

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        if($row['question_type'] === 'WA'){
          $content = $row['content'];
          $answer = $row['answer'];
          $innerContent .= "<div class='form-group shadow p-3 mb-5'>
                        <input type='text' name='question' class='form-control mb-2' value='$content' disabled>
                        <input type='text' name='answer' class='form-control mb-2' value='$answer' disabled>
                      </div>";
        }
        else{
          $content = $row['content'];
          $indexA = strpos($content, "(a)");
          $indexB = strpos($content, "(b)");
          $indexC = strpos($content, "(c)");
          $question = substr($content, 0, $indexA);
          $choiceA = substr($content, $indexA, $indexB - $indexA);
          $choiceB = substr($content, $indexB, $indexC - $indexB);
          $choiceC = substr($content, $indexC);
          $answer = "answer: " . $row['answer'];
          
          $innerContent .= "<div class='form-group shadow p-3 mb-5'>
                        <input type='text' name='question' class='form-control mb-2' value='$question' disabled>
                        <input type='text' name='question' class='form-control mb-2' value='$choiceA' disabled>
                        <input type='text' name='question' class='form-control mb-2' value='$choiceB' disabled>
                        <input type='text' name='question' class='form-control mb-2' value='$choiceC' disabled>
                        <input type='text' name='answer' class='form-control mb-2' value='$answer' disabled>
                      </div>";
        }
      }

      $innerContent .= "</form>";
      echo $innerContent;
    } else {
      echo "0 result";
    }
    
    $conn->close();
    
  }
?>
