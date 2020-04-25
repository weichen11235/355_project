<?php include('../inc/connectDB.php'); ?>
<?php 
  if($_SERVER["REQUEST_METHOD"] == "GET") {
    $grade;
    $sql = "select round(sum(points), 1) total
    from question q, questionset qs, questionset_question qsq, student_answers sa
    where q.question_id = qsq.question_id
    and sa.question_id = q.question_id
    and qsq.questionset_id = qs.questionset_id
    and qsq.questionset_id = sa.questionset_id
    and sa.answer = q.answer";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $grade = $row['total'];
    } 

    $innerContent = "<h1 class='text-center mt-5'> Total Grade: $grade </h1>";
    echo $innerContent;

  }
?>