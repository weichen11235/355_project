<?php
  $servername = "localhost";
  $dbUsername = "root";
  $dbPassword = "Aa1005234677";
  $dbName = '355project';

  // Create connection
  $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
  
  //Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?>