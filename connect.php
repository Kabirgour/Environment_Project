<?php
  $username = $_POST['username'];
  $emailid = $_POST['emailid'];
  $password = $_POST['password'];
  
  // DATABASE CONNECTION
  $conn = new mysqli('localhost', 'root', '', 'test');
  
  if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
  } else {
    $stmt = $conn->prepare("INSERT INTO registration (username, emailId, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $emailid, $password);
    
    if ($stmt->execute()) {
      echo "Registration Successful.";
    } else {
      echo "Error: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
  }
?>
