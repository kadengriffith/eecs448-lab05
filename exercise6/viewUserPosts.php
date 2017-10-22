<?php
echo "<html><body>";
$connection = new mysqli("mysql.eecs.ku.edu", "kgriffith", 'P@$$word.123', "kgriffith"); // Establish connection
$user = $_POST['choice']; // Pull user
if($connection->connect_errno) {
printf("Something went wrong: %s", $connection->connect_error);
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
echo "</body></html>";
exit();
}
$query = "SELECT * FROM Users WHERE username='" . $user . "'";
$result = $connection->query($query);
$row = $result->fetch_assoc();
$author = $row["user_id"];
$result = $connection->query("SELECT content FROM Posts WHERE author_id='" . $author . "'");
if($result->num_rows == 0) {
echo "<h5>" . $user . " does not have any posts...</h5>";
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
}else {
echo "<h3>" . $user . "'s Posts:</h3>";
while($row = $result->fetch_assoc()) {
echo "<br>" . $row["content"] . "<br><br>";
}
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
}
$connection->close();
echo "</body></html>";
?>
