<?php
echo "<html><body>";
$connection = new mysqli("mysql.eecs.ku.edu", "kgriffith", 'P@$$word.123', "kgriffith"); // Establish connection
$username = $_POST["username"]; // Pull username
$post = $_POST["post"]; // Pull post
if($connection->connect_errno) {
printf("Something went wrong: %s", $connection->connect_error);
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
echo "</body></html>";
exit();
}
if(strlen($post) == 0) {
echo "Error: Post cannot be left blank";
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
echo "</body></html>";
exit();
}
$query = "SELECT * FROM Users WHERE username=''" . $username;
$result = $posts->query($query);
if($result->num_rows == 0) {
echo "Error: " . $username . ", is not an existing username.";
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
echo "</body></html>";
exit();
}else {
$insert = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', (SELECT user_id FROM Users WHERE username='" . $username . "'))";
$posts->query($insert);
echo "Post has been added!";
}
$posts->close();
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
echo "</body></html>";
?>
