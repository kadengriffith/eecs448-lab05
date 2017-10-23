<?php
  $userPostsSub_connection = new mysqli("mysql.eecs.ku.edu", "kgriffith", 'P@$$word.123', "kgriffith"); // Establish connection
  if($userPostsSub_connection->connect_errno) {
    printf("Something went wrong: %s", $userPostsSub_connection->connect_error);
    exit();
  }
  echo "<html><body>";
  $posts = $userPostsSub_connection->query("SELECT * FROM Posts");
  $checked = false;
  while($row = $posts->fetch_assoc()) {
    if(isset($_POST[$row['post_id']])) {
      $checked = true;
    }
  }
  if(!$check) {
    echo "<h5>Error: No post to delete</h5><br><br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
    exit();
  }
  $posts = $userPostsSub_connection->query("SELECT * FROM Posts");
  echo "<h5>Post(s) successfully deleted...</h5>";
  while($row = $posts->fetch_assoc()) {
    if(isset($_POST[$row['post_id']])) {
      echo $row['post_id'] . "<br>";
      $delete = "DELETE FROM Posts WHERE post_id='" . $row['post_id'] . "'";
      $userPostsSub_connection->query($delete);
    }
  }
  echo "<br><br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
?>
