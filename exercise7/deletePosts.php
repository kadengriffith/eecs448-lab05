<?php
  echo "<html><body>";
  $connection = new mysqli("mysql.eecs.ku.edu", "kgriffith", 'P@$$word.123', "kgriffith"); // Establish connection
  if($connection->connect_errno){
    printf("Something went wrong: %s", $connection->connect_error);
    echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
    exit();
  }
  $posts = $connection->query("SELECT * FROM Posts");
  $check = false;
  while($row = $posts->fetch_assoc()){
    if(isset($_POST[$row['post_id']])){
      $check = true;
    }
  }
  if(!$check){
    echo "<h3>Error: No posts selected.</h3><br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
    exit();
  }
  $posts = $connection->query("SELECT * FROM Posts");
  echo "<h3>Post(s) Deleted: The IDs of the deleted posts are shown below</h3>";
  while($row = $posts->fetch_assoc()){
    if(isset($_POST[$row['post_id']])){
      echo $row['post_id'] . "<br>";
      $delete = "DELETE FROM Posts WHERE post_id='".$row['post_id']."'";
      $connection->query($delete);
    }
  }
  echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
  echo "</body></html>";
?>
