<?php
  $servername = "mars.cs.qc.cuny.edu";
  $dbUsername = "chwe3577";
  $dbPassword = "23433577";
  $dbName = 'chwe3577';

  // Create connection
  $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
  
  //Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?>