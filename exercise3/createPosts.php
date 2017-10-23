<?php
  echo "<html><body>";
  $post_connection = new mysqli("mysql.eecs.ku.edu", "kgriffith", 'P@$$word.123', "kgriffith"); // Establish connection
  $username = $_POST["username"]; // Pull username
  $post = $_POST["post"]; // Pull post
  if($post_connection->connect_errno) {
    printf("Something went wrong: %s", $post_connection->connect_error);
    echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
    exit();
  }else {
    if(strlen($post) == 0) {
      echo "Error: Post cannot be left blank";
      echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
      exit();
    }
    $query = "SELECT * FROM Users WHERE username='" . $username . "'";
    $result = $post_connection->query($query);
    if($result->num_rows == 0) {
      echo "Error: " . $username . ", is not an existing username";
      echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
      exit();
    }else {
      $insert = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', (SELECT user_id FROM Users WHERE username='" . $username . "'))";
      $post_connection->query($insert);
      echo "Post has been added!";
    }
    $post_connection->close();
  }
  echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
  echo "</body></html>";
?>
