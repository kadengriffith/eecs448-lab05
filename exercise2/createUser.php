<?php
  echo "<html><body>";
  $connection = new mysqli("mysql.eecs.ku.edu", "kgriffith", 'P@$$word.123', "kgriffith"); // Establish connection
  $username = $_POST["username"]; // Pull username
  if($connection->connect_errno) {
    printf("Something went wrong: %s", $connection->connect_error);
    echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
    echo "</body></html>";
    exit();
  }
  if(strlen($username) == 0) {
    echo "<h5>Error: Please enter a username.</h5>";
    echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
    echo "</body></html>";
    exit();
  }
  $query = "SELECT * FROM Users WHERE username=''" . $username;
  $result = $connection->query($query);
  if($result->num_rows != 0) {
    echo "<h5>Error: The username, " . $username . ", is already in use.</h5>";
    echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
    echo "</body></html>";
    exit();
  }else {
    $insert = "INSERT INTO Users (username) VALUES ('" . $username . "')";
    $connection->query($insert);
    echo "<h5>Username, " . $username . " has been added!</h5>";
    echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
    echo "</body></html>";
  }
  $connection->close();
?>
