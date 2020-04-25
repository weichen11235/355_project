<?php include('../inc/connectDB.php'); ?>
<?php
  $sql = "SELECT title FROM questionset";
  $result = $conn->query($sql);
  $innerContent = "";

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $title = $row['title'];
      $innerContent .= "<button type='button' class='btn btn-secondary d-block text-left w-100 p-3 rounded-0' onclick='getData(this)'>$title</button>";
    }
  }
  $innerContent .= "<button type='button' class='btn btn-secondary d-block text-left w-100 p-3 rounded-0' onclick='getScore()'>total grade</button>";
  echo $innerContent;
?>