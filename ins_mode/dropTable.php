<?php include('../inc/connectDB.php'); ?>
<?php
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $assignment_name = $_POST["assignment_name"];
    
    $sql = "DROP TABLE $assignment_name";

    if ($conn->query($sql) === TRUE) {
      echo "Table is deleted successfully";
    } else {
      echo "Error delete table: " . $conn->error;
    }

    $conn->close();
    
  }
?>