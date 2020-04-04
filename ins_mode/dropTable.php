<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "Aa1005234677";
    $dbName = 'test';

    // Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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